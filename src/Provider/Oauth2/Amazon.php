<?php

namespace Kilikili\Auth\Client\Provider\Oauth2;

class Amazon extends AbstractProvider
{
	protected $clientAuthUrl = "https://www.amazon.com/ap/oa";
	protected $clientTokenUrl = "https://api.amazon.com/auth/o2/token";
}
