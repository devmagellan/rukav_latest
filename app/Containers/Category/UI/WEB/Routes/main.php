<?php
$router->get('/category/{link}/{id}', [
  'as'   => 'get_main_home_page',
  'uses' => 'Controller@index',
]);
