<?php

/**
 * @apiGroup           Connect
 * @apiName            findConnectById
 *
 * @api                {GET} /v1/connects/:id Endpoint title here..
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
$router->get('connects/{id}', [
    'as' => 'api_connect_find_connect_by_id',
    'uses'  => 'Controller@findConnectById',
    'middleware' => [
      'auth:api',
    ],
]);
