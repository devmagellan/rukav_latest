<?php

/**
 * @apiGroup           Connect
 * @apiName            getAllConnects
 *
 * @api                {GET} /v1/connects Endpoint title here..
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
$router->get('connects', [
    'as' => 'api_connect_get_all_connects',
    'uses'  => 'Controller@getAllConnects',
    'middleware' => [
      'auth:api',
    ],
]);
