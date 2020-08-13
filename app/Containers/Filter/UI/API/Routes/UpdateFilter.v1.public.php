<?php

/**
 * @apiGroup           Filter
 * @apiName            updateFilter
 *
 * @api                {PATCH} /v1/filters/:id Endpoint title here..
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
$router->patch('filters/{id}', [
    'as' => 'api_filter_update_filter',
    'uses'  => 'Controller@updateFilter',
    'middleware' => [
      'auth:api',
    ],
]);
