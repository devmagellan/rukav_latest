<?php

/**
 * @apiGroup           Site
 * @apiName            updateSite
 *
 * @api                {PATCH} /v1/sites/:id Endpoint title here..
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
$router->patch('sites/{id}', [
    'as' => 'api_site_update_site',
    'uses'  => 'Controller@updateSite',
    'middleware' => [
      'auth:api',
    ],
]);
