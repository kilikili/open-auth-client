<?php

require __DIR__ . '/../vendor/autoload.php';
use Kilikili\Auth\Client\Provider\ProviderType;
use Kilikili\Auth\Client\Provider\Oauth\ProviderEnabled;
$argu = array(
    'providerType'  => ProviderType::PROVIDER_OAUTH,
    'provider'      => ProviderEnabled::PROVIDER_BITBUCKET,
    'clientId'      => 'your-client-id',
    'clientSecure'  => 'your-client-secure',
    'redirectUri'   => 'https://example.com/oauth/bitbucket.php',
    'scopes'        => '',
    'state'         => 'message from client',
);

$custData = array();
$custRData = array();
$custAuthData = array();

include "common_new.php";

die();
