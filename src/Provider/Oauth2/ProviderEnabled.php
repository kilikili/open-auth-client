<?php

namespace Kilikili\Auth\Client\Provider\Oauth2;

class ProviderEnabled
{
	const PROVIDER_GOOGLE = "Google";
	const PROVIDER_AMAZON = "Amazon";
	const PROVIDER_HEROKU = "Heroku";
	const PROVIDER_LIVEID = "Liveid";
	const PROVIDER_GITHUB = "Github";
	const PROVIDER_BAIDU = "Baidu";
	const PROVIDER_DROPBOX = "Dropbox";
	const PROVIDER_WEIBO = "Weibo";
    const PROVIDER_FACEBOOK = "Facebook";
    
	public static $providerEnabled = array(
			self::PROVIDER_GOOGLE,
			self::PROVIDER_AMAZON,
			self::PROVIDER_HEROKU,
			self::PROVIDER_LIVEID,
			self::PROVIDER_GITHUB,
			self::PROVIDER_BAIDU,
			self::PROVIDER_DROPBOX,
			self::PROVIDER_WEIBO,
            self::PROVIDER_FACEBOOK
		);
}