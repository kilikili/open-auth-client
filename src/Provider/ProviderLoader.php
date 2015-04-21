<?php

namespace Kilikili\Auth\Client\Provider;

use Closure;
//use Guzzle\Http\Exception\BadResponseException;
//use Guzzle\Service\Client as GuzzleClient;
//use League\OAuth2\Client\Exception\IDPException as IDPException;
//use League\OAuth2\Client\Grant\GrantInterface;
//use League\OAuth2\Client\Token\AccessToken as AccessToken;

class ProviderLoader
{
	public static function init($providerType, $provider, $argu, $custData = array(), $custRData = array())
	{
		$class = "Kilikili\\Auth\\Client\\Provider\\$providerType\\$provider";
		try {
			if (class_exists($class)) {
				return new $class($argu, $custData, $custRData);
			}else {
				throw new \Exception("Unknow Oauth Type!!");
			}
		} catch ( \Exception $e) {
			echo $e->getMessage();
		}
	}
}