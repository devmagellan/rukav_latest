<?php
$router->get('/category/{id}', [
  'as'   => 'get_main_home_page',
  'uses' => 'Controller@index',
]);
