<?php

/**
 * @apiGroup           PrivateCabinet
 * @apiName            findPrivateCabinetById
 *
 * @api                {GET} /v1/privatecabinets/:id Endpoint title here..
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
$router->get('privatecabinets/{id}', [
    'as' => 'api_privatecabinet_find_private_cabinet_by_id',
    'uses'  => 'Controller@findPrivateCabinetById',
    'middleware' => [
      'auth:api',
    ],
]);
