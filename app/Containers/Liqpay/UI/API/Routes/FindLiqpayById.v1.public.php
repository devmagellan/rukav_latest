<?php

/**
 * @apiGroup           Liqpay
 * @apiName            findLiqpayById
 *
 * @api                {GET} /v1/liqpays/:id Endpoint title here..
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
$router->get('liqpays/{id}', [
    'as' => 'api_liqpay_find_liqpay_by_id',
    'uses'  => 'Controller@findLiqpayById',
    'middleware' => [
      'auth:api',
    ],
]);
