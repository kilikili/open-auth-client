<?php

namespace Kilikili\Auth\Client\Provider\Oauth2;

use Kilikili\Auth\Client\Provider\ProviderLoader;

class Executor {

	public function execution($providerType, $providerType, $argu, $custData, $custRData){
		$provider = ProviderLoader::init($providerType, $providerType, $argu, $custData, $custRData);

		if (!isset($_GET['code'])) {
			$provider->run();
		} else {
			echo $provider->receive($_GET['code']);
		}

		die();
	}
}
