<?php

require __DIR__ . '/../vendor/autoload.php';
use Kilikili\Auth\Client\Provider\ProviderType;
use Kilikili\Auth\Client\Provider\Oauth2\ProviderEnabled;
$argu = array(
    'providerType'  => ProviderType::PROVIDER_OAUTH2,
    'provider'      => ProviderEnabled::PROVIDER_LIVEID,
    'clientId'      => 'your-client-id',
    'clientSecure'  => 'your-client-secure',
    'redirectUri'   => 'https://example.com/oauth2/liveid.php',
    'scopes'        => 'wl.basic',
    'state'         => 'message from client',
);

$custData = array();
$custRData = array();

include "common.php";