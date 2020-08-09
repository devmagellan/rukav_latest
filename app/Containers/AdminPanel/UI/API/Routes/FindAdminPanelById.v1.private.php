<?php

/**
 * @apiGroup           AdminPanel
 * @apiName            findAdminPanelById
 *
 * @api                {GET} /v1/adminpanels/:id Endpoint title here..
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
$router->get('adminpanels/{id}', [
    'as' => 'api_adminpanel_find_admin_panel_by_id',
    'uses'  => 'Controller@findAdminPanelById',
    'middleware' => [
      'auth:api',
    ],
]);
