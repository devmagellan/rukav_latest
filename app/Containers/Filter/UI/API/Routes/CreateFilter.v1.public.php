<?php

/**
 * @apiGroup           Filter
 * @apiName            createFilter
 *
 * @api                {POST} /v1/filters Endpoint title here..
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
$router->post('filters', [
    'as' => 'api_filter_create_filter',
    'uses'  => 'Controller@createFilter',
    'middleware' => [
      'auth:api',
    ],
]);
