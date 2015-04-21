<?php

require __DIR__ . '/../vendor/autoload.php';
use Kilikili\Auth\Client\Provider\ProviderType;
use Kilikili\Auth\Client\Provider\Oauth\ProviderEnabled;
$argu = array(
    'providerType'  => ProviderType::PROVIDER_OAUTH,
    'provider'      => ProviderEnabled::PROVIDER_FLICKR,
    'clientId'      => 'your-client-id',
    'clientSecure'  => 'your-client-secure',
    'redirectUri'   => 'https://example.com/oauth/flickr.php',
    'scopes'        => 'email',
    'state'         => 'message from client',
);

$custData = array();//array('oauth_callback' => $argu['redirectUri']);
$custRData = array();
$custAuthData = array();

include "common_new.php";

die();
