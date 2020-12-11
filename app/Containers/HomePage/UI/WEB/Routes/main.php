<?php
 $router->get('/', [
  'as'   => 'get_main_home_page',
  'uses' => 'Controller@index',
]); 

 $router->get('/search', [
  'as'   => 'get_search',
  'uses' => 'Controller@search',
]);

$router->post('/categoryLink', [
    'as'   => 'categoryLink',
    'uses' => 'Controller@categoryLink',
]);


$router->post('/getCountryData', [
    'as' => 'save_preview',
    'uses'  => 'Controller@getCountryData',
]);

$router->get('/telcheck', [
    'as' => 'telcheck',
    'uses'  => 'Controller@telcheck',
]);


$router->post('/cabinet/header_notify_clean', [
    'as' => 'header_notify_clean',
    'uses'  => 'Controller@headerNotifyClean',
]);


