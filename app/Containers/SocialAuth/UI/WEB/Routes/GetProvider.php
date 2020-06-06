<?php

// provider login redirect (WEB)
$router->get('redirect/{driver}', 'Controller@redirectAll')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));
