<?php

namespace Kilikili\Auth\Client\Provider\Oauth;

class Pixnet extends AbstractProvider
{
	protected $clientRequestTokenUrl = "http://emma.pixnet.cc/oauth/request_token";
	protected $clientAuthUrl = "http://emma.pixnet.cc/oauth/authorize";
	protected $clientAccessTokenUrl = "http://emma.pixnet.cc/oauth/access_token";

}
