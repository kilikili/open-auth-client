<?php

use Kilikili\Auth\Client\Provider\ProviderLoader;

$provider = ProviderLoader::init($argu['providerType'], $argu['provider'], $argu, $custData, $custRData);

if (!isset($_GET['oauth_token'])) {
	$authUrl = $provider->run();
	header('Location: '.$authUrl."&".http_build_query($custAuthData));
} else {
	echo $provider->receive($_GET);
}