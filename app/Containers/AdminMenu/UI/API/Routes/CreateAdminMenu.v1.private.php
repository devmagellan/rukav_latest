<?php

/**
 * @apiGroup           AdminMenu
 * @apiName            createAdminMenu
 *
 * @api                {POST} /v1/adminmenus Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->post('adminmenus', [
    'as' => 'api_adminmenu_create_admin_menu',
    'uses'  => 'Controller@createAdminMenu',
    'middleware' => [
      'auth:api',
    ],
]);
