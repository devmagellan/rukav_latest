<?php

/**
 * @apiGroup           Liqpay
 * @apiName            deleteLiqpay
 *
 * @api                {DELETE} /v1/liqpays/:id Endpoint title here..
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
$router->delete('liqpays/{id}', [
    'as' => 'api_liqpay_delete_liqpay',
    'uses'  => 'Controller@deleteLiqpay',
    'middleware' => [
      'auth:api',
    ],
]);
