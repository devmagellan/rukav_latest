<?php
$router->get('/category/{link}', [
  'as'   => 'get_main_home_page',
  'uses' => 'Controller@index',
]);
