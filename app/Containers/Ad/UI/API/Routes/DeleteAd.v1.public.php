<?php

/**
 * @apiGroup           Ad
 * @apiName            deleteAd
 *
 * @api                {DELETE} /v1/ads/:id Endpoint title here..
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
$router->delete('ads/{id}', [
    'as' => 'api_ad_delete_ad',
    'uses'  => 'Controller@deleteAd',
    'middleware' => [
      'auth:api',
    ],
]);
