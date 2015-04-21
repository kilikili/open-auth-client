<?php

namespace Kilikili\Auth\Client\Provider\Oauth;

class Flickr extends AbstractProvider
{
	protected $clientRequestTokenUrl = "http://www.flickr.com/services/oauth/request_token";
	protected $clientAuthUrl = "http://www.flickr.com/services/oauth/authorize";
	protected $clientAccessTokenUrl = "http://www.flickr.com/services/oauth/access_token";
}
