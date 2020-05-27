<?php

/**
 * @apiGroup           Site
 * @apiName            getAllSites
 *
 * @api                {GET} /v1/sites Endpoint title here..
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
$router->get('sites', [
    'as' => 'api_site_get_all_sites',
    'uses'  => 'Controller@getAllSites',
    'middleware' => [
      'auth:api',
    ],
]);
