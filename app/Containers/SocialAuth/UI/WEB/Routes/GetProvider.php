<?php

// provider login redirect (WEB)
/* $router->get('redirect/{driver}', 'Controller@redirectAll')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers'))); */
	
	
$router->get('redirect/vkontakte', 'Controller@redirectVkontakte')->name('login.provider.vk');
$router->get('redirect/odnoklassniki', 'Controller@redirectOklassniki')->name('login.provider.ok');
$router->get('redirect/facebook', 'Controller@redirectFacebook')->name('login.provider.fb');
$router->get('redirect/google', 'Controller@redirectGoogle')->name('login.provider.google');

$router->get('redirect/pinterest', 'Controller@redirectPinterest')->name('login.provider.pi');
$router->get('redirect/apple', 'AppleController@login')->name('login.provider.apple');
