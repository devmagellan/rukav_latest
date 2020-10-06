<?php

namespace App\Containers\SocialAuth\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use Laravel\Socialite\Facades\Socialite;
use App\Containers\User\Models\User;

/**
 * Class Controller
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */

class Utils {
    public static function redirect($uri = '') {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".$uri, TRUE, 302);
        exit;
    }
}

/**
 * @url http://ok.ru/dk?st.cmd=appEdit&st._aid=Apps_Info_MyDev_AddApp добавить приложение
 */

class OAuthOK {

    const APP_ID = 512000692510; //ID приложения
    const APP_PUBLIC = 'CPBCJPJGDIHBABABA'; //Публичный ключ
    const APP_SECRET = 'C1515CCFF78B0F18F6DF3DE7'; //Защищенный ключ
    const URL_CALLBACK = 'https://rukav.co.uk/ok/callback'; //URL, на который произойдет перенаправление после авторизации
    const URL_AUTHORIZE = 'http://www.odnoklassniki.ru/oauth/authorize';
    const URL_GET_TOKEN = 'http://api.odnoklassniki.ru/oauth/token.do';
    const URL_ACCESS_TOKEN = 'http://api.odnoklassniki.ru/fb.do';

    private static $token;
    public static $userId;
    public static $userData;

    /**
     * @url http://apiok.ru/wiki/pages/viewpage.action?pageId=81822109
     */
    public static function goToAuth()
    {
       Utils::redirect(self::URL_AUTHORIZE .
            '?client_id=' . self::APP_ID .
			'&scope=GET_EMAIL' .
            '&response_type=code' .
            '&redirect_uri=' . urlencode(self::URL_CALLBACK)); //Utils::redirect
    }

    public static function getToken($code) {

        $data = array(
            'code' => trim($code),
            'redirect_uri' => self::URL_CALLBACK,
            'client_id' => self::APP_ID,
            'client_secret' => self::APP_SECRET,
            'grant_type' => 'authorization_code'
        );

        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  =>"Content-type: application/x-www-form-urlencoded\r\n".
                    "Accept: */*\r\n",
                'content' => http_build_query($data)
            )
        );

        if (!($response = @file_get_contents(self::URL_GET_TOKEN, false, stream_context_create($opts)))) {
            return false;
        }

        $result = json_decode($response);
        if (empty($result->access_token)) {
            return false;
        }

        self::$token = $result->access_token;

        return true;
    }

    /**
     * Если данных недостаточно, то посмотрите что можно ещё запросить по этой ссылке
     * @url http://apiok.ru/wiki/display/api/users.getCurrentUser+ru
     */
    public static function getUser() {

        if (!self::$token) {
            return false;
        }

        $url = self::URL_ACCESS_TOKEN .
            '?access_token=' . self::$token .
            '&method=users.getCurrentUser' .
            '&application_key=' . self::APP_PUBLIC .
            '&sig=' . md5('application_key=' . self::APP_PUBLIC . 'method=users.getCurrentUser' . md5(self::$token . self::APP_SECRET));

        if (!($response = @file_get_contents($url))) {
            return false;
        }

        $user = json_decode($response);

        if (empty($user)) {
            return false;
        }

        self::$userId = $user->uid;
        return self::$userData = $user;
    }
}
 
 
class Controller extends WebController
{
	
    /**
     * @param $provider
     *
     * @return  mixed
     */
    public function redirectAll($provider)
    {
        //return Socialite::driver($provider)->redirect();
		return Socialite::with('vkontakte')->redirect();
    }
	
	public function redirectPinterest()
    {
        //return Socialite::driver($provider)->redirect();
		return Socialite::with('pinterest')->redirect();
		
    }
	
	public function redirectVkontakte()
    {
        return Socialite::driver('vkontakte')->redirect();
		//return Socialite::with('vkontakte')->redirect();
    }
	
	public function redirectFacebook()
    {
        //return Socialite::driver($provider)->redirect();
		return Socialite::with('facebook')->redirect();
    }
	
	public function redirectGoogle()
    {
        //return Socialite::driver($provider)->redirect();
		return Socialite::with('google')->redirect();
    }
	
	public function redirectOklassniki()
    {
        //return Socialite::driver($provider)->redirect();
		//return Socialite::with('odnoklassniki')->stateless()->redirect();
		OAuthOK::goToAuth();
    }

    /**
     * @param $provider
     *
     * @return  mixed
     */
    public function handleCallbackAll($provider)
    {
        return Socialite::driver($provider)->user();
    }
	
	
      /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
	 	  public function handleProviderCallbackOk()
    {
		$provider='odnoklassniki';
	   try {	
		
// Пример использования класса:
if (!empty($_GET['error'])) {
    // Пришёл ответ с ошибкой. Например, юзер отменил авторизацию.
    die($_GET['error']);
} elseif (empty($_GET['code'])) {
    // Самый первый запрос
    OAuthOK::goToAuth();
} else {
    // Пришёл ответ без ошибок после запроса авторизации
    if (!OAuthOK::getToken($_GET['code'])) {
        die('Error - no token by code');
    }
    /*
     * На данном этапе можно проверить зарегистрирован ли у вас одноклассник с id = OAuthOK::$userId
     * Если да, то можно просто авторизовать его и не запрашивать его данные.
     */

    $user = OAuthOK::getUser();
    //dd($user);	
}
     
			
/* 			$token='tkn1ovDjckqr8uZKJNlHnz2iEw97XAGMYKi3JE8f4vqWR6ayDyEcUwFpYFpGGCQL3bath';
			$token=urlencode($token.'3a207c89d0ef85167215d9125122ce80');
            $user = Socialite::driver('odnoklassniki')->stateless()->userFromToken($_GET['code']);
			dump($user);
			$accessTokenResponseBody = $user->accessTokenResponseBody;
			dump($accessTokenResponseBody); */
			
        } catch (\Exception $e) {
			
            return redirect('/login');
        }
        // only allow people with @company.com to login
     /*   if(explode("@", $user->email)[1] !== 'company.com'){
            return redirect()->to('/');
        }*/
        // check if they're an existing user
			if(!isset($user->email)){
				session()->put('registration_error','В ваших данных из соцсети не хватает email для регистрации, Мы не смогли Вас зарегистрировать, попробуйте альтернативный способ');
				return redirect('/')->withInput()->withErrors(array('user_name' => 'some message'));   
			}
		
        $existingUser = User::where('email', $user->email)->withTrashed()->first();
        if($existingUser){
			if(null!=$existingUser->deleted_at){
				User::where('email', $user->email)->withTrashed()->update(['deleted_at'=>null]);
			}
            // log them in
            auth()->login($existingUser, true);
        } else {
			
		
			
			  $newUser                  = new User;
            $newUser->name            = $user->first_name;
            $newUser->sername            = $user->last_name;
            $newUser->email           = $user->email;
            //$newUser->google_id       = $user->id;
            //$newUser->avatar          = $user->pic_1;
            $newUser->active = 1;
            $newUser->save();
			$user = $this->createUser($user,$provider);
			\Auth::guard('web')->login($newUser, true);
			
        }
        return redirect()->to('/');
    }
	 
	  public function handleProviderCallbackVk()
    {
		session()->forget('registration_error');
		$provider='vk';

        try {
            $user = Socialite::driver('vkontakte')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        // only allow people with @company.com to login
     /*   if(explode("@", $user->email)[1] !== 'company.com'){
            return redirect()->to('/');
        }*/
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->withTrashed()->first();
        if($existingUser){
			
			if(null!=$existingUser->deleted_at){
				User::where('email', $user->email)->withTrashed()->update(['deleted_at'=>null]);
			}
            // log them in
\Auth::guard('web')->login($newUser, true);
        } else {
			//dd($user);
			if(!$user->user['email']){
				session()->put('registration_error','В ваших данных из соцсети не хватает email для регистрации, Мы не смогли Вас зарегистрировать, попробуйте альтернативный способ');
				return redirect('/')->withInput()->withErrors(array('user_name' => 'some message'));   
			}
			
			  $newUser                  = new User;
            $newUser->name            = $user->user['first_name'];
            $newUser->sername            = $user->user['last_name'];
            $newUser->email           = $user->user['email'];
            //$newUser->google_id       = $user->id;
            $newUser->avatar          = $user->avatar;
            //$newUser->avatar_original = $user->avatar;
            //$newUser->login = $user->user['email'];
            //$newUser->department = 'none';
            $newUser->active = 1;
            //$newUser->company_id          = 1;
            $newUser->save();
			//$user = $this->createUser($user,$provider);
			\Auth::guard('web')->login($newUser, true);
			
        }
        return redirect()->to('/');
    }
	 
    public function handleProviderCallback($provider)
    {

        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (\Exception $e) {
			dd($e);
            return redirect('/login');
        }
        // only allow people with @company.com to login
     /*   if(explode("@", $user->email)[1] !== 'company.com'){
            return redirect()->to('/');
        }*/
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->withTrashed()->first();
		
        if($existingUser){
			
			if(null!=$existingUser->deleted_at){
				User::where('email', $user->email)->withTrashed()->update(['deleted_at'=>null]);
			}
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
			if($provider=='google'){
            $newUser                  = new User;
            $newUser->name            = $user->user['given_name'];
            $newUser->sername            = $user->user['family_name'];
            $newUser->email           = $user->user['email'];
            $newUser->google_id       = $user->id;
            $newUser->avatar          = $user->avatar;
            $newUser->avatar_original = $user->avatar_original;
            $newUser->login = $user->user['email'];
            $newUser->department = 'none';
            $newUser->active = 1;
            $newUser->company_id          = 1;
            $newUser->save();
            \Auth::guard('web')->login($newUser, true);
			}
			elseif($provider=='facebook'){
			$user = $this->createUser($user,$provider);
			\Auth::guard('web')->login($user, true);
			}
        }
        return redirect()->to('/');
    }
	
	  public function callbackFacebook($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
		$existingUser = User::where('email', $user->email)->first();
        $user = $this->createUser($getInfo,$provider);
        auth()->login($user, true);
        return redirect()->to('/home');
    }
	
	    function createUser($getInfo,$provider){
            $user = User::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'avatar'    => $getInfo->avatar,
				'department' => 'none',
            'active' => 1,
            'company_id'         => 1
            ]);
       
        return $user;
    }
	
		  public function handleProviderCallbackPinterest()
    {
		session()->forget('registration_error');
		$provider='pinterest';

        try {
            $user = Socialite::driver('pinterest')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        // only allow people with @company.com to login
     /*   if(explode("@", $user->email)[1] !== 'company.com'){
            return redirect()->to('/');
        }*/
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
\Auth::guard('web')->login($newUser, true);
        } else {
			
			dd($user);
			//dd($user);
			if(!$user->user['email']){
				session()->put('registration_error','В ваших данных из соцсети не хватает email для регистрации, Мы не смогли Вас зарегистрировать, попробуйте альтернативный способ');
				return redirect('/')->withInput()->withErrors(array('user_name' => 'some message'));   
			}
			
			  $newUser                  = new User;
            $newUser->name            = $user->user['first_name'];
            $newUser->sername            = $user->user['last_name'];
            $newUser->email           = $user->user['email'];
            //$newUser->google_id       = $user->id;
            $newUser->avatar          = $user->avatar;
            //$newUser->avatar_original = $user->avatar;
            //$newUser->login = $user->user['email'];
            //$newUser->department = 'none';
            $newUser->active = 1;
            //$newUser->company_id          = 1;
            $newUser->save();
			//$user = $this->createUser($user,$provider);
			\Auth::guard('web')->login($newUser, true);
			
        }
        return redirect()->to('/');
    }

}
