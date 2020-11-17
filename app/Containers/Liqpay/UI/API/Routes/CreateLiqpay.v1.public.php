<?php

/**
 * @apiGroup           Liqpay
 * @apiName            createLiqpay
 *
 * @api                {POST} /v1/liqpays Endpoint title here..
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
$router->post('liqpays', [
    'as' => 'api_liqpay_create_liqpay',
    'uses'  => 'Controller@createLiqpay',
    'middleware' => [
      'auth:api',
    ],
]);
