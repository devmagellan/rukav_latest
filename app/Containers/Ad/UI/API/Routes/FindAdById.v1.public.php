<?php

/**
 * @apiGroup           Ad
 * @apiName            findAdById
 *
 * @api                {GET} /v1/ads/:id Endpoint title here..
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
$router->get('ads/{id}', [
    'as' => 'api_ad_find_ad_by_id',
    'uses'  => 'Controller@findAdById',
    'middleware' => [
      'auth:api',
    ],
]);
