<?php

namespace App\Containers\SocialAuth\UI\WEB\Controllers;

use App\Containers\User\Jobs\SendEmailVerification;
use App\Containers\User\Jobs\VerifyMail;
use App\Ship\Parents\Controllers\WebController;
use Laravel\Socialite\Facades\Socialite;
use App\Containers\User\Models\User;
use Illuminate\Support\Facades\Hash;
use SocialiteProviders\Manager\Config;
use App\Containers\User\Jobs\VerifySocialMail;
use Illuminate\Support\Str;
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

class OAuthVK {

    const APP_ID = 7504077; //ID приложения
    const APP_SECRET = 'ZYTbZVJZE6KlkYjbJYU8'; //Защищенный ключ
    const URL_CALLBACK = 'https://rukav.co.uk/vk/callback'; //URL, на который произойдет перенаправление после авторизации
	const URL_AUTHORIZE = 'http://oauth.vk.com/authorize';
	const URL_GET_TOKEN = 'https://api.vk.com/oauth/access_token';//'https://oauth.vk.com/access_token';
	const URL_ACCESS_TOKEN = 'https://api.vk.com/method/users.get';

	private static $token;
    public static $userId;
    public static $userData;

	 public static function goToAuth()
    {
		\Log::info('goToAuth');
       Utils::redirect(self::URL_AUTHORIZE .

            '?client_id=' . self::APP_ID .
			'&scope=email' .
			'&response_type=code' .
            '&redirect_uri=' . urlencode(self::URL_CALLBACK)); //Utils::redirect
    }




	    public static function getToken($code) {

        $data = array(
            'code' => trim($code),
            'redirect_uri' => self::URL_CALLBACK,
            'client_id' => self::APP_ID,
            'client_secret' => self::APP_SECRET,
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



        self::$token = $result;

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

        /* $url = self::URL_ACCESS_TOKEN .
            '?access_token=' . self::$token->access_token .
            '&fields=uid,first_name,last_name,screen_name,sex,bdate,photo_big' .
            '&uids=' . self::$token->user_id;

        if (!($response = @file_get_contents($url))) {
            return false;
        } */
		$params = array(
            'uids'         => self::$token->user_id,
           'fields'       => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big,email',
            'access_token' => self::$token->access_token
        );

        $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params). "&v=6.0")), true);
        if (isset($userInfo['response'][0]['uid'])) {

            $userInfo = $userInfo['response'][0];
            $result = true;

        }
		\Log::info('$token'.!isset(self::$token->email));
		if(!isset(self::$token->email)){
			}
			else{
				$userInfo['response'][0]['email']=self::$token->email;
			}
			

        $user = $userInfo['response'][0];

        if (empty($user)) {
            return false;
        }

        //self::$userId = $user->user_id;
        return self::$userData = $user;
    }





}


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
       // return Socialite::driver('vkontakte')->redirect();
		//return Socialite::with('vkontakte')->redirect();
		
		OAuthVK::goToAuth();
    }

	public function redirectFacebook()
    {
        //return Socialite::driver($provider)->redirect();
	 	return Socialite::driver('facebook')->fields([
            'first_name', 'last_name', 'email', 'gender', 'location'
        ])->scopes([
            'email'
        ])->redirect(); 
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

$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("https://api.ipregistry.co/{$ip}?key=tryout"));

			  $newUser                  = new User;
            $newUser->name            = $user->first_name;
            $newUser->sername            = $user->last_name;
            $newUser->email           = $user->email;
            //$newUser->google_id       = $user->id;
            //$newUser->avatar          = $user->pic_1;
            $newUser->active = 1;
			$newUser->is_client = 1;
			$newUser->vid_user= 'Частная';
			$newUser->confirmed = User::STATUS_SOCIALACTIVE;
			$newUser->country=$details->location->country->code;
            $newUser->save();
			//$user = $this->createUser($user,$provider);
			\Auth::guard('web')->login($newUser, true);

        }
        return redirect()->to('/');
    }

/* 	  public function handleProviderCallbackVk()
    {
		session()->forget('registration_error');
		$provider='vk';

        try {
            $user = Socialite::driver('vkontakte')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        // only allow people with @company.com to login

        $existingUser = User::where('email', $user->email)->withTrashed()->first();
        if($existingUser){

			if(null!=$existingUser->deleted_at){
				User::where('email', $user->email)->withTrashed()->update(['deleted_at'=>null]);
			}
\Auth::guard('web')->login($newUser, true);
        } else {
			if(!$user->user['email']){
				session()->put('registration_error','В ваших данных из соцсети не хватает email для регистрации, Мы не смогли Вас зарегистрировать, попробуйте альтернативный способ');
				return redirect('/')->withInput()->withErrors(array('user_name' => 'some message'));
			}

			  $newUser                  = new User;
            $newUser->name            = $user->user['first_name'];
            $newUser->sername            = $user->user['last_name'];
            $newUser->email           = $user->user['email'];
            $newUser->avatar          = $user->avatar;
            $newUser->active = 1;
            $newUser->save();
			\Auth::guard('web')->login($newUser, true);

        }
        return redirect()->to('/');
    } */

    public function handleProviderCallback($provider)
    {

        try {
			if($provider=='facebook'){
				$user = Socialite::driver($provider)->stateless()->fields([
            'first_name', 'last_name', 'email', 'gender', 'location'
        ])->scopes([
            'email','location'
        ])->user();
			}
			else{
				$user = Socialite::driver($provider)->stateless()->user();
			}
		
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
			$newUser->is_client = 1;
			$newUser->vid_user= 'Частная';
             $newUser->confirmed = User::STATUS_SOCIALACTIVE;
            $newUser->company_id          = 1;
            save();
			
            \Auth::guard('web')->login($newUser, true);
			}
			elseif($provider=='facebook'){
				\Log::info('Facebook1');
			$user = $this->createUser($user,$provider);
      dispatch(new VerifySocialMail($user))->onQueue('queue_name');
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
		\Log::info('Facebook2');
      dispatch(new VerifySocialMail($user))->onQueue('queue_name');
        auth()->login($user, true);
        return redirect()->to('/home');
    }

	    function createUser($getInfo,$provider){
\Log::info('$getInfo',array($getInfo));
        $password="password";
        $random=Str::random(7);
		$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("https://api.ipregistry.co/{$ip}?key=tryout"));
       $user = User::create([
                'name'     => $getInfo->user['first_name'],
				'sername'     => $getInfo->user['last_name'],
                'email'    => $getInfo->user['email'],
                'avatar'    => $getInfo->avatar,
				'vid_user'    => 'Частная',
				'department' => 'none',
				'country'=>$details->location->country->code,
            'encripted_password' => openssl_encrypt($random,"AES-128-ECB",$password),
            'active' => 1,
			'is_client' => 1,
              'confirmed' => User::STATUS_SOCIALACTIVE,
            'company_id'         => 1,
              'password'=>Hash::make($random),
              'verify_token' => Str::random(),

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
			$newUser->is_client= 1;
			$newUser->vid_user= 'Частная';
            //$newUser->company_id          = 1;
            $newUser->save();
			//$user = $this->createUser($user,$provider);
			\Auth::guard('web')->login($newUser, true);

        }
        return redirect()->to('/');
    }


	public function handleProviderCallbackVk()
    {
		$provider='vkontakte';
	   try {
\Log::info('handleProviderCallbackVk');
// Пример использования класса:
if (!empty($_GET['error'])) {
    // Пришёл ответ с ошибкой. Например, юзер отменил авторизацию.
    die($_GET['error']);
} elseif (empty($_GET['code'])) {
    // Самый первый запрос
    OAuthVK::goToAuth();
} else {

    // Пришёл ответ без ошибок после запроса авторизации
    if (!OAuthVK::getToken($_GET['code'])) {
        die('Error - no token by code');
    }
    /*
     * На данном этапе можно проверить зарегистрирован ли у вас одноклассник с id = OAuthOK::$userId
     * Если да, то можно просто авторизовать его и не запрашивать его данные.
     */
    $user = OAuthVK::getUser();
	
}


/* 			$token='tkn1ovDjckqr8uZKJNlHnz2iEw97XAGMYKi3JE8f4vqWR6ayDyEcUwFpYFpGGCQL3bath';
			$token=urlencode($token.'3a207c89d0ef85167215d9125122ce80');
            $user = Socialite::driver('odnoklassniki')->stateless()->userFromToken($_GET['code']);
			dump($user);
			$accessTokenResponseBody = $user->accessTokenResponseBody;
			dump($accessTokenResponseBody); */

        } catch (\Exception $e) {
			\Log::info('Exception',array($e));
            return redirect('/login');
        }
        // only allow people with @company.com to login
     /*   if(explode("@", $user->email)[1] !== 'company.com'){
            return redirect()->to('/');
        }*/
        // check if they're an existing user
		\Log::info('user=>',array($user));
		if($user==false){
			session()->put('registration_error','В ваших данных из соцсети не хватает email для регистрации, Мы не смогли Вас зарегистрировать, попробуйте альтернативный способ');
				return redirect('/')->withInput()->withErrors(array('user_name' => 'some message'));
		}
			elseif(!array_key_exists('email', $user)){
				session()->put('registration_error','В ваших данных из соцсети не хватает email для регистрации, Мы не смогли Вас зарегистрировать, попробуйте альтернативный способ');
				return redirect('/')->withInput()->withErrors(array('user_name' => 'some message'));
			}

        $existingUser = User::where('email', $user['email'])->withTrashed()->first();
        if($existingUser){
			if(null!=$existingUser->deleted_at){
				User::where('email', $user['email'])->withTrashed()->update(['deleted_at'=>null]);
			}
            // log them in
            auth()->login($existingUser, true);
        } else {
		$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("https://api.ipregistry.co/{$ip}?key=tryout"));
			$newUser                  = new User;
            $newUser->name            = $user['first_name'];
            $newUser->sername         = $user['last_name'];
            $newUser->email           = $user['email'];
			$newUser->vid_user= 'Частная';
			$newUser->is_client= 1;
            //$newUser->google_id       = $user->id;
            //$newUser->avatar          = $user->pic_1;
          $password="password";
          $random=Str::random(7);
          $newUser->encripted_password = openssl_encrypt($random,"AES-128-ECB",$password);


          $newUser->password=Hash::make($random);

          $newUser->verify_token = Str::random();
            $newUser->active = 1;
          $newUser->confirmed = User::STATUS_SOCIALACTIVE;
		  $newUser->country=$details->location->country->code;
          $newUser->save();
          dispatch(new VerifySocialMail($newUser))->onQueue('queue_name');

			//$user = $this->createUser($user,$provider);
			\Auth::guard('web')->login($newUser, true);

        }
        return redirect()->to('/');
    }

}
