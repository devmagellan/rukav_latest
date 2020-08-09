<?php

/**
 * @apiGroup           AdminPanel
 * @apiName            getAllAdminPanels
 *
 * @api                {GET} /v1/adminpanels Endpoint title here..
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
$router->get('adminpanels', [
    'as' => 'api_adminpanel_get_all_admin_panels',
    'uses'  => 'Controller@getAllAdminPanels',
    'middleware' => [
      'auth:api',
    ],
]);
