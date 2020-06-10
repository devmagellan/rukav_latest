<?php

/**
 * @apiGroup           Connect
 * @apiName            updateConnect
 *
 * @api                {PATCH} /v1/connects/:id Endpoint title here..
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
$router->patch('connects/{id}', [
    'as' => 'api_connect_update_connect',
    'uses'  => 'Controller@updateConnect',
    'middleware' => [
      'auth:api',
    ],
]);
