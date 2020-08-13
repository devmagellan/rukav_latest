<?php

/**
 * @apiGroup           Filter
 * @apiName            getAllFilters
 *
 * @api                {GET} /v1/filters Endpoint title here..
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
$router->get('filters', [
    'as' => 'api_filter_get_all_filters',
    'uses'  => 'Controller@getAllFilters',
    'middleware' => [
      'auth:api',
    ],
]);
