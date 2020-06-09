<?php

// provider login redirect (WEB)
/* $router->get('redirect/{driver}', 'Controller@redirectAll')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers'))); */
$router->get('redirect/vkontakte', 'Controller@redirectVkontakte')->name('login.provider');
$router->get('redirect/odnoklassniki', 'Controller@redirectOklassniki')->name('login.provider');
