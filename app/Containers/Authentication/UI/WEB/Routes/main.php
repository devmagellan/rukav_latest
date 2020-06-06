<?php

$router->post('/loginUser', [
  'as'   => 'login_user',
  'uses' => 'Controller@loginUser',
]);

$router->get('/logoutUser', [
  'as'   => 'logout_user',
  'uses' => 'Controller@logoutUser',
]);

/* $router->get('redirect/{driver}', '\App\Containers\Authentication\UI\WEB\Controllers\Controller@redirectToProvider')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));
	
	$router->get('/callback/{facebook}', '\App\Containers\Authentication\UI\WEB\Controllers\Controller@handleProviderCallback'); */

