<?php

$router->post('/loginUser', [
  'as'   => 'login_user',
  'uses' => 'Controller@loginUser',
]);

$router->get('/logoutUser', [
  'as'   => 'logout_user',
  'uses' => 'Controller@logoutUser',
]);
