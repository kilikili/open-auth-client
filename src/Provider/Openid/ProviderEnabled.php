<?php

namespace Kilikili\Auth\Client\Provider\Openid;

class ProviderEnabled
{
	const PROVIDER_GOOGLE = "Google";
	const PROVIDER_PIXNET = "Pixnet";
	public static $providerEnabled = array(
			self::PROVIDER_GOOGLE,
			self::PROVIDER_PIXNET,
		);
}