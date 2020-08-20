<?php

$router->get('/user', [
    'as'   => 'get_user_home_page',
    'uses' => 'Controller@sayWelcome',
]);

$router->post('/register', [
  'as'   => 'register_user_web',
  'uses' => 'Controller@registerUser',
]);

$router->post('/users/delete', [
  'as'   => 'users_delete',
  'uses' => 'Controller@deleteUser',
]);


$router->post('/changeUserData', [
    'as'   => '/changeUserData',
    'uses' => 'Controller@postUpdate',
]);
$router->post('/changeRegisterFromSimpleUser', [
    'as'   => 'changeRegisterFromSimpleUser',
    'uses' => 'Controller@changeRegisterFromSimpleUser',
]);

$router->post('/changeRegisterFromRestUser', [
    'as'   => 'changeRegisterFromSimpleUser',
    'uses' => 'Controller@changeRegisterFromRestUser',
]);

$router->post('/confirm_email', [
    'as'   => 'confirm_email',
    'uses'       => 'Controller@confirmEmail',
]);

$router->post('/confirm_email_if_registered', [
  'as'   => 'confirm_email_if_registered',
  'uses'       => 'Controller@confirmEmailIfRegistered',
]);

$router->post('/confirm_email_phone', [
    'as'   => 'confirm_email_phone',
    'uses'       => 'Controller@confirmEmailPhone',
]);

$router->post('/confirm_phone', [
    'as'   => 'confirm_phone',
    'uses'       => 'Controller@confirmPhone',
]);

