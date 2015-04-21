<?php

namespace Kilikili\Auth\Client\Provider\Oauth;

class Dropbox extends AbstractProvider
{
	protected $clientRequestTokenUrl = "https://api.dropbox.com/1/oauth/request_token";
	protected $clientAuthUrl = "https://www.dropbox.com/1/oauth/authorize";
	protected $clientAccessTokenUrl = "https://api.dropbox.com/1/oauth/access_token";
}
