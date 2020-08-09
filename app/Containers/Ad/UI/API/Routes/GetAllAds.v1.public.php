<?php

/**
 * @apiGroup           Ad
 * @apiName            getAllAds
 *
 * @api                {GET} /v1/ads Endpoint title here..
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
$router->get('ads', [
    'as' => 'api_ad_get_all_ads',
    'uses'  => 'Controller@getAllAds',
    'middleware' => [
      'auth:api',
    ],
]);
