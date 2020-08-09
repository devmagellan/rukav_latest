<?php

/**
 * @apiGroup           AdminPanel
 * @apiName            updateAdminPanel
 *
 * @api                {PATCH} /v1/adminpanels/:id Endpoint title here..
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
$router->patch('adminpanels/{id}', [
    'as' => 'api_adminpanel_update_admin_panel',
    'uses'  => 'Controller@updateAdminPanel',
    'middleware' => [
      'auth:api',
    ],
]);
