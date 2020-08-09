<?php

/**
 * @apiGroup           AdminMenu
 * @apiName            getAllAdminMenus
 *
 * @api                {GET} /v1/adminmenus Endpoint title here..
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
$router->get('adminmenus', [
    'as' => 'api_adminmenu_get_all_admin_menus',
    'uses'  => 'Controller@getAllAdminMenus',
    'middleware' => [
      'auth:api',
    ],
]);
