<?php

namespace Kilikili\Auth\Client\Provider\Oauth2;

class Baidu extends AbstractProvider
{
	protected $clientAuthUrl = "https://openapi.baidu.com/oauth/2.0/authorize";
	protected $clientTokenUrl = "https://openapi.baidu.com/oauth/2.0/token";
}
