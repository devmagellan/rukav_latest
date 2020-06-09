<?php

// provider callback handler

	$router->get('/callback/{provider}', 'Controller@handleProviderCallback');
$router->get('/vk/callback', 'Controller@handleProviderCallbackVk');
$router->get('/ok/callback', 'Controller@handleProviderCallbackOk');
