<?php

namespace Kilikili\Auth\Client\Provider\Oauth;

class Linkedin extends AbstractProvider
{
	protected $clientRequestTokenUrl = "https://api.linkedin.com/uas/oauth/requestToken";
	protected $clientAuthUrl = "https://api.linkedin.com/uas/oauth/authorize";
	protected $clientAccessTokenUrl = "https://api.linkedin.com/uas/oauth/accessToken";

}
