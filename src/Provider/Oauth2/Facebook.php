<?php

namespace Kilikili\Auth\Client\Provider\Oauth2;

class Facebook extends AbstractProvider
{
	protected $clientAuthUrl = "https://www.facebook.com/v%s/dialog/oauth";
	protected $clientTokenUrl = "https://graph.facebook.com/v%s/oauth/access_token";
    
    public function __construct($argu, $custData = array(), $custRData = array()){
        parent::__construct($argu, $custData, $custRData);
        $this->clientAuthUrl = sprintf($this->clientAuthUrl, $custData['version']);
        $this->clientTokenUrl = sprintf($this->clientTokenUrl, $custData['version']);
    }
}
