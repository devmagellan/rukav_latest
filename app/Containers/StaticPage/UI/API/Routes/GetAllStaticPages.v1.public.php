<?php

/**
 * @apiGroup           StaticPage
 * @apiName            getAllStaticPages
 *
 * @api                {GET} /v1/staticpages Endpoint title here..
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
$router->get('staticpages', [
    'as' => 'api_staticpage_get_all_static_pages',
    'uses'  => 'Controller@getAllStaticPages',
    'middleware' => [
      'auth:api',
    ],
]);
