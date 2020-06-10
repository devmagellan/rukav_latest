<?php

/** @var Route $router */
$router->get('ads', [
    'as' => 'web_ad_index',
    'uses'  => 'Controller@index',
   /* 'middleware' => [
      'auth:web',
    ],*/
]);

$router->post('ads/data', [
    'as' => 'web_ads_index_post',
    'uses'  => 'Controller@postData',
    /* 'middleware' => [
       'auth:web',
     ],*/
]);

$router->get('serverSide',  ['as' => 'serverSide','uses'=>'Controller@adsByGroupDatatables']);

$router->post('/ads/showPhotoAdsModal', [
    'as' => 'ads_showPhotoAdsModal',
    'uses'  => 'Controller@showPhotoAdsModal',
    /* 'middleware' => [
       'auth:web',
     ],*/
]);

$router->post('/add/wishList', [
    'as' => 'ads_wishlist_update',
    'uses'  => 'Controller@setWishListStatus',
    /* 'middleware' => [
       'auth:web',
     ],*/
]);




