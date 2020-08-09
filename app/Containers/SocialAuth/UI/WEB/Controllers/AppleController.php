<?php

namespace App\Containers\SocialAuth\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use Laravel\Socialite\Facades\Socialite;
use App\Containers\User\Models\User;
use GeneaLabs\LaravelSocialiter\Facades\Socialiter;


 
class AppleController extends WebController
{
	
   public function __construct()
    {
        $this->middleware('web')->except('logout');
    }

    public function login()
    {
        return Socialite::driver("sign-in-with-apple")
            ->scopes(["name", "email"])
            ->redirect();
    }

    public function callback()
    {
        // get abstract user object, not persisted
         $user = Socialite::driver("sign-in-with-apple")
             ->user();
			 	if(!isset($user->email)){
				session()->put('registration_error','В ваших данных из соцсети не хватает email для регистрации, Мы не смогли Вас зарегистрировать, попробуйте альтернативный способ');
				return redirect('/')->withInput()->withErrors(array('user_name' => 'some message'));   
			}
		$existingUser = User::where('email', $user->email)->first();
		 if($existingUser){
            // log them in
        \Auth::guard('web')->login($existingUser, true);
		return redirect()->to('/');
        } else {
        $user = $this->createUser($user);}
        \Auth::guard('web')->login($user, true);
        return redirect()->to('/');
        
        // or use Socialiter to automatically manage user resolution and persistence
       //$user = Socialiter::driver("sign-in-with-apple")
           //->login();
    }
	
	function createUser($getInfo){
            $user = User::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'avatar'    => $getInfo->avatar,
            'active' => 1,
            ]);
       
        return $user;
    }

}
