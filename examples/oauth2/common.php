<?php

use Kilikili\Auth\Client\Provider\ProviderLoader;

$provider = ProviderLoader::init($argu['providerType'], $argu['provider'], $argu, $custData, $custRData);

if (!isset($_GET['code'])) {
	$provider->run();
} else {
	echo $provider->receive($_GET['code']);
}

die();
