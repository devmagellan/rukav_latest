<?php

/**
 * @apiGroup           AdminMenu
 * @apiName            updateAdminMenu
 *
 * @api                {PATCH} /v1/adminmenus/:id Endpoint title here..
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
$router->patch('adminmenus/{id}', [
    'as' => 'api_adminmenu_update_admin_menu',
    'uses'  => 'Controller@updateAdminMenu',
    'middleware' => [
      'auth:api',
    ],
]);
