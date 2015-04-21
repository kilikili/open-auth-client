<?php

namespace Kilikili\Auth\Client\Provider\Oauth2;

class Dropbox extends AbstractProvider
{
	protected $clientAuthUrl = "https://www.dropbox.com/1/oauth2/authorize";
	protected $clientTokenUrl = "https://api.dropbox.com/1/oauth2/token";
}
