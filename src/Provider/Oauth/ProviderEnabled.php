<?php

namespace Kilikili\Auth\Client\Provider\Oauth;

class ProviderEnabled
{
	const PROVIDER_GOOGLE = "Google";
	const PROVIDER_BITBUCKET = "Bitbucket";
	const PROVIDER_DROPBOX = "Dropbox";
	const PROVIDER_EVERNOTE = "Evernote";
	const PROVIDER_FLICKR = "Flickr";
	const PROVIDER_LINKEDIN = "Linkedin";
	const PROVIDER_PIXNET = "Pixnet";
	const PROVIDER_PLURK = "Plurk";
	public static $providerEnabled = array(
			self::PROVIDER_GOOGLE,
			self::PROVIDER_BITBUCKET,
			self::PROVIDER_DROPBOX,
			self::PROVIDER_EVERNOTE,
			self::PROVIDER_FLICKR,
			self::PROVIDER_LINKEDIN,
			self::PROVIDER_PIXNET,
			self::PROVIDER_PLURK,
		);
}