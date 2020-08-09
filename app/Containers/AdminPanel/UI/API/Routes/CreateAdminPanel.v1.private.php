<?php

/**
 * @apiGroup           AdminPanel
 * @apiName            createAdminPanel
 *
 * @api                {POST} /v1/adminpanels Endpoint title here..
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
$router->post('adminpanels', [
    'as' => 'api_adminpanel_create_admin_panel',
    'uses'  => 'Controller@createAdminPanel',
    'middleware' => [
      'auth:api',
    ],
]);
