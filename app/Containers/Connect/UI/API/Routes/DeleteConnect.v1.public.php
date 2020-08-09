<?php

/**
 * @apiGroup           Connect
 * @apiName            deleteConnect
 *
 * @api                {DELETE} /v1/connects/:id Endpoint title here..
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
$router->delete('connects/{id}', [
    'as' => 'api_connect_delete_connect',
    'uses'  => 'Controller@deleteConnect',
    'middleware' => [
      'auth:api',
    ],
]);
