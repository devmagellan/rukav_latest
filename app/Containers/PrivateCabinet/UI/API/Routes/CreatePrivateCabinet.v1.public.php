<?php

/**
 * @apiGroup           PrivateCabinet
 * @apiName            createPrivateCabinet
 *
 * @api                {POST} /v1/privatecabinets Endpoint title here..
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
$router->post('privatecabinets', [
    'as' => 'api_privatecabinet_create_private_cabinet',
    'uses'  => 'Controller@createPrivateCabinet',
    'middleware' => [
      'auth:api',
    ],
]);
