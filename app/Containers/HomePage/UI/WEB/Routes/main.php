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

$router->get('/all_author_ads', [
    'as' => 'save_preview',
    'uses'  => 'Controller@allAuthorAds',
]);

$router->post('/getCountryData', [
    'as' => 'save_preview',
    'uses'  => 'Controller@getCountryData',
]);


