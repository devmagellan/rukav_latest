<?php

/** @var Route $router */
$router->get('ads', [
    'as' => 'web_ad_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:admin',
    ],
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



$router->get('/_make_categories', [
    'as' => 'make_categories',
    'uses'  => 'Controller@makeCategories',

]);


$router->post('/show_subcat_gumtree', [
    'as' => 'show_subcat_gumtree',
    'uses'  => 'Controller@showSubcatGumtree',
    /* 'middleware' => [
       'auth:web',
     ],*/
]);

$router->post('/save_gumtree', [
    'as' => 'save_subcat_gumtree',
    'uses'  => 'Controller@saveGumtree',
    /* 'middleware' => [
       'auth:web',
     ],*/
]);




$router->post('/show_maincat_gumtree', [
    'as' => 'show_maincat_gumtree',
    'uses'  => 'Controller@showMaincatGumtree',
    /* 'middleware' => [
       'auth:web',
     ],*/
]);


$router->get('/admin/add_ads', [
    'as' => 'admin_add_ads',
    'uses'  => 'Controller@adminAddAds',
  'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
       'auth:admin',
     ],
]);


$router->post('/getAllParentsString', [
    'as' => 'getAllParentsString',
    'uses'  => 'Controller@getAllParentsString',
    /* 'middleware' => [
       'auth:web',
     ],*/
]);


$router->get('/save_preview/{id}', [
    'as' => 'save_preview',
    'uses'  => 'Controller@savePreview',
]);

$router->post('/add_deleted_imgs_to_session', [
    'as' => 'addDeletedImgsToSession',
    'uses'  => 'ImgController@addDeletedImgsToSession',
]);

$router->post('/complain', [
  'as' => 'addComplaining',
  'uses'  => 'Controller@complain',
]);











