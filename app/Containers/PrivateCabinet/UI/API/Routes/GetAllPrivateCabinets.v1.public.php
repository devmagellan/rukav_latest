<?php

/**
 * @apiGroup           PrivateCabinet
 * @apiName            getAllPrivateCabinets
 *
 * @api                {GET} /v1/privatecabinets Endpoint title here..
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
$router->get('privatecabinets', [
    'as' => 'api_privatecabinet_get_all_private_cabinets',
    'uses'  => 'Controller@getAllPrivateCabinets',
    'middleware' => [
      'auth:api',
    ],
]);
