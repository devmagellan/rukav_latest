<?php
$router->get('/category/{id}', [
  'as'   => 'get_main_home_page',
  'uses' => 'Controller@index',
]);
$router->get('/more_categories/{id}', [
    'as'   => 'more_categories',
    'uses' => 'Controller@moreCategories',
]);


$router->get('edit_categories', [
    'as' => 'web_adminpanel_index',
    'uses'  => 'Controller@adminIndex',
    'middleware' => [
        'auth:admin',
    ],
]);

$router->get('/all_author_ads', [
    'as' => 'save_preview',
    'uses'  => 'Controller@allAuthorAds',
]);



$router->post('/show_subcat_all_levels', [
    'as' => 'show_subcat_all_levels',
    'uses'  => 'Controller@show_subcat_all_levels',
    'middleware' => [
        'auth:admin',
    ],
]);

$router->post('/show_subcat', [
    'as' => 'show_subcat',
    'uses'  => 'Controller@show_subcat',
    'middleware' => [
        'auth:admin',
    ],
]);

$router->post('/show_subcat_all_levels_back', [
    'as' => 'show_subcat_all_levels_back',
    'uses'  => 'Controller@show_subcat_all_levels_back',
    'middleware' => [
        'auth:admin',
    ],
]);


$router->post('/admin/change_category_name', [
    'as' => 'change_category_name',
    'uses'  => 'Controller@changeCatName',
    'middleware' => [
        'auth:admin',
    ],
]);


$router->post('/admin/delete_cat', [
    'as' => 'delete_cat',
    'uses'  => 'Controller@deleteCat',
    'middleware' => [
        'auth:admin',
    ],
]);

$router->post('/company/photo/saveRootCatPhotoToSession', [
    'as' => 'saveRootCatPhotoToSession',
    'uses'  => 'Controller@saveRootCatPhotoToSession',
    'middleware' => [
        'auth:admin',
    ],
]);

$router->post('/company/root_cat_photos/create', [
    'as' => 'root_cat_photos_create',
    'uses'  => 'Controller@postSaveRootCatPhoto',
    'middleware' => [
        'auth:admin',
    ],
]);

$router->post('/category_position', [
    'as'   => 'category_position',
    'uses'       => 'Controller@setPosition',
    //'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin'
    ],
]);


$router->post('/show_cats_main_level', [
    'as'   => 'show_cats_main_level',
    'uses'       => 'Controller@showCatsMainLevel',
    //'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin'
    ],
]);


$router->post('/show_subcat_depends', [
    'as'   => 'show_cats_main_level',
    'uses'       => 'Controller@showSubCatsMainDepends',
    //'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin'
    ],
]);

