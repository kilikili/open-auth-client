<?php

namespace Kilikili\Auth\Client\Provider\Oauth2;

class Heroku extends AbstractProvider
{
	protected $clientAuthUrl = "https://id.heroku.com/oauth/authorize";
	protected $clientTokenUrl = "https://id.heroku.com/oauth/token";
}
