<?php

require __DIR__ . '/../vendor/autoload.php';
use Kilikili\Auth\Client\Provider\ProviderType;
use Kilikili\Auth\Client\Provider\Oauth2\ProviderEnabled;
$argu = array(
    'providerType'  => ProviderType::PROVIDER_OAUTH2,
    'provider'      => ProviderEnabled::PROVIDER_GOOGLE,
    'clientId'      => 'your-client-id',
    'clientSecure'  => 'your-client-secure',
    'redirectUri'   => 'https://example.com/oauth2/google.php',
    'scopes'        => 'email',
    'state'         => 'message from client',
);

$custData = array("access_type" => "offline", "approve_prompt" => "forece", "openid.realm" => "https://example.com");
$custRData = array("is_get" => false);

include "common.php";
