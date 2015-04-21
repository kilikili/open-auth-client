<?php

require __DIR__ . '/../vendor/autoload.php';
use Kilikili\Auth\Client\Provider\ProviderType;
use Kilikili\Auth\Client\Provider\Oauth\ProviderEnabled;
$argu = array(
    'providerType'  => ProviderType::PROVIDER_OAUTH,
    'provider'      => ProviderEnabled::PROVIDER_PLURK,
    'clientId'      => 'your-client-id',
    'clientSecure'  => 'your-client-secure',
    'redirectUri'   => 'https://example.com/oauth/plurk.php',
    'scopes'        => 'email',
    'state'         => 'message from client',
);

//$data[] = urlencode();
$custData = array();
$custRData = array();
$custAuthData = array();

include "common_new.php";

die();
