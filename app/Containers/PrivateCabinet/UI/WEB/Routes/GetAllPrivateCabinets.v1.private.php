<?php

/** @var Route $router */
$router->get('/private_cabinet/{type?}', [
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
    'uses'  => 'Controller@uploadProfileImageAjax',
    /*'middleware' => [
      'auth:web',
    ],*/
]);


$router->post('/cabinet/conversation', [
    'as' => 'cabinet_conversation',
    'uses'  => 'Controller@conversationData',
    /*'middleware' => [
      'auth:web',
    ],*/
]);

$router->post('/cabinet/clean_conversation', [
    'as' => 'cabinet_clean_conversation',
    'uses'  => 'Controller@cleanConversationData',
    /*'middleware' => [
      'auth:web',
    ],*/
]);



$router->post('/cabinet/messagesData', [
    'as' => 'cabinet_messagesData',
    'uses'  => 'Controller@messagesData',
    /*'middleware' => [
      'auth:web',
    ],*/
]);


$router->get('/send_message_to_client', [
    'as' => 'send_message_to_client',
    'uses'  => 'Controller@checkData',
    'middleware' => [
      'auth:web',]
]);


$router->post('/add_second_messanger_group', [
    'as' => 'add_second_messanger_group',
    'uses'  => 'Controller@addSecondMessangerGroup',
    /*'middleware' => [
      'auth:web',
    ],*/
]);


$router->post('/delete_second_group', [
    'as' => 'delete_second_group',
    'uses'  => 'Controller@deleteSecondGroup',
    /*'middleware' => [
      'auth:web',
    ],*/
]);




