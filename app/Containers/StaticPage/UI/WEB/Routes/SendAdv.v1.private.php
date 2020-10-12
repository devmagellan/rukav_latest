<?php

$router->post('/adv/connect', [
    'as'   => 'staticpages_adv',
    'uses'       => 'Controller@sendAdvRequest',
]);

$router->post('/adv/connect/career', [
  'as'   => 'staticpages_adv',
  'uses'       => 'Controller@sendAdvRequestCareer',
]);






