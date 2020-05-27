<?php

/**
 * @apiGroup           Site
 * @apiName            deleteSite
 *
 * @api                {DELETE} /v1/sites/:id Endpoint title here..
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
$router->delete('sites/{id}', [
    'as' => 'api_site_delete_site',
    'uses'  => 'Controller@deleteSite',
    'middleware' => [
      'auth:api',
    ],
]);
