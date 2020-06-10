<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Third Party Services
  |--------------------------------------------------------------------------
  |
  | This file is for storing the credentials for third party services such
  | as Mailgun, Postmark, AWS and more. This file provides the de facto
  | location for this type of information, allowing packages to have
  | a conventional file to locate the various service credentials.
  |
  */

  'mailgun' => [
    'domain' => env('MAILGUN_DOMAIN'),
    'secret' => env('MAILGUN_SECRET'),
    'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
  ],

  'postmark' => [
    'token' => env('POSTMARK_TOKEN'),
  ],

  'ses' => [
    'key' => env('AWS_ACCESS_KEY_ID'),
    'secret' => env('AWS_SECRET_ACCESS_KEY'),
    'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
  ],

  'facebook' => [
    'client_id' => '242771253750028',
    'client_secret' => 'c33c2e109a77dc30e1d9738441206889',
    'redirect' => 'https://rukav.uk/callback/facebook',
  ],
  
  'google' => [
    'client_id'     => env('AUTH_GOOGLE_CLIENT_ID'),
    'client_secret' => env('AUTH_GOOGLE_CLIENT_SECRET'),
    'redirect'      => env('AUTH_GOOGLE_CLIENT_REDIRECT'),
],
'vkontakte' => [
    'client_id' => env('VKONTAKTE_KEY'),
    'client_secret' => env('VKONTAKTE_SECRET'),
    'redirect' => env('VKONTAKTE_REDIRECT_URI')
],
'odnoklassniki' => [
    'client_id' => env('ODNOKLASSNIKI_KEY'),
    'client_secret' => env('ODNOKLASSNIKI_SECRET'),
	'client_public' => env('ODNOKLASSNIKI_PUBLIC'),
    'redirect' => env('ODNOKLASSNIKI_REDIRECT_URI')
],

];
