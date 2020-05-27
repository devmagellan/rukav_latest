<?php

/**
 * @apiGroup           Ad
 * @apiName            createAd
 *
 * @api                {POST} /v1/ads Endpoint title here..
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
$router->post('ads', [
    'as' => 'api_ad_create_ad',
    'uses'  => 'Controller@createAd',
    'middleware' => [
      'auth:api',
    ],
]);
