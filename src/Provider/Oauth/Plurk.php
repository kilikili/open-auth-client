<?php

namespace Kilikili\Auth\Client\Provider\Oauth;

class Plurk extends AbstractProvider
{
	protected $clientRequestTokenUrl = "http://www.plurk.com/OAuth/request_token";
	protected $clientAuthUrl = "http://www.plurk.com/OAuth/authorize";
	protected $clientAccessTokenUrl = "http://www.plurk.com/OAuth/access_token";

}
