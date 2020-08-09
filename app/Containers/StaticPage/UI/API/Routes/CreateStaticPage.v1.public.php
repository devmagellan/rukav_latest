<?php

/**
 * @apiGroup           StaticPage
 * @apiName            createStaticPage
 *
 * @api                {POST} /v1/staticpages Endpoint title here..
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
$router->post('staticpages', [
    'as' => 'api_staticpage_create_static_page',
    'uses'  => 'Controller@createStaticPage',
    'middleware' => [
      'auth:api',
    ],
]);
