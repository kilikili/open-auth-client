<?php

require __DIR__ . '/../vendor/autoload.php';
use Kilikili\Auth\Client\Provider\ProviderType;
use Kilikili\Auth\Client\Provider\Oauth\ProviderEnabled;
$argu = array(
    'providerType'  => ProviderType::PROVIDER_OAUTH,
    'provider'      => ProviderEnabled::PROVIDER_GOOGLE,
    'clientId'      => 'your-client-id',
    'clientSecure'  => 'your-client-secure',
    'redirectUri'   => 'https://example.com/oauth/google.php',
    'scopes'        => 'https://www.google.com/base/feeds/',
    'xoauth'         => array('xoauth_displayname' => 'OpenIdAuthTest'),
);

//$data[] = urlencode();
//$custData = array('scope' => "https://www.google.com/base/feeds/", 'xoauth_displayname' => "OpenIdAuthTest");
$custData = array('scope' => "https://www.google.com/base/feeds/");
$custRData = array();
$custAuthData = array();

include "common_new.php";

die();
