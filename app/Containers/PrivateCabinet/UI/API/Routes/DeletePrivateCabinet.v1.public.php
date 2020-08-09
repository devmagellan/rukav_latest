<?php

/**
 * @apiGroup           PrivateCabinet
 * @apiName            deletePrivateCabinet
 *
 * @api                {DELETE} /v1/privatecabinets/:id Endpoint title here..
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
$router->delete('privatecabinets/{id}', [
    'as' => 'api_privatecabinet_delete_private_cabinet',
    'uses'  => 'Controller@deletePrivateCabinet',
    'middleware' => [
      'auth:api',
    ],
]);
