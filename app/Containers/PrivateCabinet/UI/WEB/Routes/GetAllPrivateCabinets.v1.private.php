<?php

/** @var Route $router */
$router->get('private_cabinet', [
    'as' => 'web_privatecabinet_index',
    'uses'  => 'Controller@index',
    /*'middleware' => [
      'auth:web',
    ],*/
]);



$router->post('/ad/message_activity_set', [
    'as' => 'ad_message_activity_set',
    'uses'  => 'Controller@setIsActive',
    /*'middleware' => [
      'auth:web',
    ],*/
]);


$router->post('/cabinet/deleteFromFavorites', [
    'as' => 'cabinet_deleteFromFavorites',
    'uses'  => 'Controller@setIsActive',
    /*'middleware' => [
      'auth:web',
    ],*/
]);


$router->post('/profile/save', [
    'as' => 'profile_save',
    'uses'  => 'Controller@profileSave',
    /*'middleware' => [
      'auth:web',
    ],*/
]);

$router->post('/change_password', [
    'as' => 'change_password',
    'uses'  => 'Controller@changePassword',
    /*'middleware' => [
      'auth:web',
    ],*/
]);


$router->post('/upload-profile-image-ajax', [
    'as' => 'upload-profile-image-ajax',
    'uses'  => 'Controller@/uploadProfileImageAjax',
    /*'middleware' => [
      'auth:web',
    ],*/
]);



