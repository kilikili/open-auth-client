<?php

namespace Kilikili\Auth\Client\Provider\Oauth;

class Bitbucket extends AbstractProvider
{
	protected $clientRequestTokenUrl = "https://bitbucket.org/api/1.0/oauth/request_token";
	protected $clientAuthUrl = "https://bitbucket.org/api/1.0/oauth/authenticate";
	protected $clientAccessTokenUrl = "https://bitbucket.org/api/1.0/oauth/access_token";
}
