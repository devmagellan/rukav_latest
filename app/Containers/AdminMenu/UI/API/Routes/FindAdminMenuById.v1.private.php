<?php

/**
 * @apiGroup           AdminMenu
 * @apiName            findAdminMenuById
 *
 * @api                {GET} /v1/adminmenus/:id Endpoint title here..
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
$router->get('adminmenus/{id}', [
    'as' => 'api_adminmenu_find_admin_menu_by_id',
    'uses'  => 'Controller@findAdminMenuById',
    'middleware' => [
      'auth:api',
    ],
]);
