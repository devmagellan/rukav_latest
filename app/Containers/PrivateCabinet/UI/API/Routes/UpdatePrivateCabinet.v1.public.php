<?php

/**
 * @apiGroup           PrivateCabinet
 * @apiName            updatePrivateCabinet
 *
 * @api                {PATCH} /v1/privatecabinets/:id Endpoint title here..
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
$router->patch('privatecabinets/{id}', [
    'as' => 'api_privatecabinet_update_private_cabinet',
    'uses'  => 'Controller@updatePrivateCabinet',
    'middleware' => [
      'auth:api',
    ],
]);
