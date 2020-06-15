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
        //return Socialite::driver($provider)->redirect();
		return Socialite::with('vkontakte')->redirect();
    }
	
	public function redirectFacebook()
    {
        //return Socialite::driver($provider)->redirect();
		return Socialite::with('facebook')->redirect();
    }
	
	public function redirectGoogle()
    {
        //return Socialite::driver($provider)->redirect();
		return Socialite::with('googlek')->redirect();
    }
	
	public function redirectOklassniki()
    {
        //return Socialite::driver($provider)->redirect();
		return Socialite::with('odnoklassniki')->stateless()->redirect();
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
            $user = Socialite::driver('odnoklassniki')->stateless()->user();
			$accessTokenResponseBody = $user->accessTokenResponseBody;
			
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
            auth()->login($existingUser, true);
        } else {
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
			$user = $this->createUser($user,$provider);
			auth()->login($newUser, true);
			
        }
        return redirect()->to('/');
    }
	 
	  public function handleProviderCallbackVk()
    {
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
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
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
			$user = $this->createUser($user,$provider);
			auth()->login($newUser, true);
			
        }
        return redirect()->to('/');
    }
	 
    public function handleProviderCallback($provider)
    {


        try {
            $user = Socialite::driver($provider)->user();
            //dd($user );
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
            auth()->login($newUser, true);
			}
			elseif($provider=='facebook'){
			$user = $this->createUser($user,$provider);
			auth()->login($newUser, true);
			}
        }
        return redirect()->to('/');
    }
	
	  public function callbackFacebook($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
		$existingUser = User::where('email', $user->email)->first();
        $user = $this->createUser($getInfo,$provider);
        auth()->login($user);
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

}
