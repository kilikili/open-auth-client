<?php

require __DIR__ . '/../vendor/autoload.php';
use Kilikili\Auth\Client\Provider\ProviderType;
use Kilikili\Auth\Client\Provider\Openid\ProviderEnabled;
$argu = array(
    'providerType'  => ProviderType::PROVIDER_OPENID,
    'provider'      => ProviderEnabled::PROVIDER_GOOGLE,
    'openidRealm'  => 'https://example.com',
    'redirectUri'   => 'https://example.com/openid/google.php',
    'scopes'        => 'profile',
);

$custData = array();
$custRData = array();

include "common_new.php";
