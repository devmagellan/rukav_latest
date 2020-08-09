<?php

/**
 * @apiGroup           Connect
 * @apiName            createConnect
 *
 * @api                {POST} /v1/connects Endpoint title here..
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
$router->post('connects', [
    'as' => 'api_connect_create_connect',
    'uses'  => 'Controller@createConnect',
    'middleware' => [
      'auth:api',
    ],
]);
