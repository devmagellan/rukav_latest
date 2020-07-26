<?php

/**
 * @apiGroup           StaticPage
 * @apiName            updateStaticPage
 *
 * @api                {PATCH} /v1/staticpages/:id Endpoint title here..
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
$router->patch('staticpages/{id}', [
    'as' => 'api_staticpage_update_static_page',
    'uses'  => 'Controller@updateStaticPage',
    'middleware' => [
      'auth:api',
    ],
]);
