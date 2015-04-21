<?php

namespace Kilikili\Auth\Client\Provider\Oauth2;

class Liveid extends AbstractProvider
{
	protected $clientAuthUrl = "https://login.live.com/oauth20_authorize.srf";
	protected $clientTokenUrl = "https://login.live.com/oauth20_token.srf";
}
