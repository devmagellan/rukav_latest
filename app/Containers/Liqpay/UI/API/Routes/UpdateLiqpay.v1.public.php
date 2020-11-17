<?php

/**
 * @apiGroup           Liqpay
 * @apiName            updateLiqpay
 *
 * @api                {PATCH} /v1/liqpays/:id Endpoint title here..
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
$router->patch('liqpays/{id}', [
    'as' => 'api_liqpay_update_liqpay',
    'uses'  => 'Controller@updateLiqpay',
    'middleware' => [
      'auth:api',
    ],
]);
