<?php

$router->post('/loginUser', [
  'as'   => 'login_user',
  'uses' => 'Controller@loginUser',
]);
