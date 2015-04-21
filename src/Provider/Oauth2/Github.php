<?php

namespace Kilikili\Auth\Client\Provider\Oauth2;

class Github extends AbstractProvider
{
	protected $clientAuthUrl = "https://github.com/login/oauth/authorize";
	protected $clientTokenUrl = "https://github.com/login/oauth/access_token";
}
