<?php

namespace Kilikili\Auth\Client\Provider\Oauth;

class Evernote extends AbstractProvider
{
	protected $clientRequestTokenUrl = "https://sandbox.evernote.com/oauth";
	protected $clientAuthUrl = "https://sandbox.evernote.com/OAuth.action";
	protected $clientAccessTokenUrl = "https://sandbox.evernote.com/oauth";
}
