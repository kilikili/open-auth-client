<?php

namespace Kilikili\Auth\Client\Provider\Oauth;

class Google extends AbstractProvider
{
	protected $clientRequestTokenUrl = "https://www.google.com/accounts/OAuthGetRequestToken";
	protected $clientAuthUrl = "https://www.google.com/accounts/OAuthAuthorizeToken";
	protected $clientAccessTokenUrl = "https://www.google.com/accounts/OAuthGetAccessToken";
}
