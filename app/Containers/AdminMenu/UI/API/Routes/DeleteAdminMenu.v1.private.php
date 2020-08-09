<?php

/**
 * @apiGroup           AdminMenu
 * @apiName            deleteAdminMenu
 *
 * @api                {DELETE} /v1/adminmenus/:id Endpoint title here..
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
$router->delete('adminmenus/{id}', [
    'as' => 'api_adminmenu_delete_admin_menu',
    'uses'  => 'Controller@deleteAdminMenu',
    'middleware' => [
      'auth:api',
    ],
]);
