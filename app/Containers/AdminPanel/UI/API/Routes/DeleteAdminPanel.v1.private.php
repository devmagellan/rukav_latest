<?php

/**
 * @apiGroup           AdminPanel
 * @apiName            deleteAdminPanel
 *
 * @api                {DELETE} /v1/adminpanels/:id Endpoint title here..
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
$router->delete('adminpanels/{id}', [
    'as' => 'api_adminpanel_delete_admin_panel',
    'uses'  => 'Controller@deleteAdminPanel',
    'middleware' => [
      'auth:api',
    ],
]);
