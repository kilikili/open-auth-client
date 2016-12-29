<?php

namespace Kilikili\Auth\Client\Provider\Oauth2;

use Kilikili\Auth\Client\Provider\ProviderLoader;

class Executor {
	private $code=null;

	public function __construct($code = null){
		$this->code = $code;
	}

	public function execution($providerType, $provider, $argu, $custData, $custRData){
		$provider = ProviderLoader::init($providerType, $provider, $argu, $custData, $custRData);
		
		$code = $this->code;
		if (null === $code) {
			$provider->run();
		} else {
			return $provider->receive($code);
		}
	}
}
