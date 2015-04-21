<?php

namespace Kilikili\Auth\Client\Provider\Oauth2;

class Google extends AbstractProvider
{
	protected $clientAuthUrl = "https://accounts.google.com/o/oauth2/auth";
	protected $clientTokenUrl = "https://accounts.google.com/o/oauth2/token";
}
