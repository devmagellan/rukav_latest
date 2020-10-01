<?php

$router->post('/adv/connect', [
    'as'   => 'staticpages_adv',
    'uses'       => 'Controller@sendAdvRequest',
]);






