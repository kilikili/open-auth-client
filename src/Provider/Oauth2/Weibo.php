<?php

namespace Kilikili\Auth\Client\Provider\Oauth2;

class Weibo extends AbstractProvider
{
	protected $clientAuthUrl = "https://api.weibo.com/oauth2/authorize";
	protected $clientTokenUrl = "https://api.weibo.com/oauth2/access_token";
}
