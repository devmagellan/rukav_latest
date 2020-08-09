<?php

/**
 * @apiGroup           StaticPage
 * @apiName            findStaticPageById
 *
 * @api                {GET} /v1/staticpages/:id Endpoint title here..
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
$router->get('staticpages/{id}', [
    'as' => 'api_staticpage_find_static_page_by_id',
    'uses'  => 'Controller@findStaticPageById',
    'middleware' => [
      'auth:api',
    ],
]);
