<?php

namespace Kilikili\Auth\Client\Provider\Oauth2;

use Closure;
use Kilikili\Auth\Client\Provider\AbstractProvider as BaseProvider;

abstract class AbstractProvider extends BaseProvider
{
	protected $scopes;
	protected $clientAuthUrl;
	protected $clientTokenUrl;
	protected $state;

	//public abstract function getAuthorizationUrl();
	public function getAuthorizationUrl(){
		$apiUrl = $this->clientAuthUrl;
		$data['redirect_uri'] = $this->redirectUri;
		$data['client_id'] = $this->clientId;
		$data['scope'] = $this->scopes;
		$data['state'] = $this->state;
		$data['response_type'] = "code";

		$data = array_merge($data,$this->customerData);
		$this->state = $data['state'];

		$url = $apiUrl . "?" . http_build_query($data);
		return $url;
	}

	public function run(){
	    // If we don't have an authorization code then get one
	    $authUrl = $this->getAuthorizationUrl();
	    header('Location: '.$authUrl);
	    exit;
	}

	public function receive($result){
		$data['code'] = $result;
		$data['client_id'] = $this->clientId;
		$data['redirect_uri'] = $this->redirectUri;
		$data['client_secret'] = $this->clientSecure;
		$data['is_get'] = false;
		$data['grant_type'] = "authorization_code";

		$data = array_merge($data,$this->customerRData);

		$rs = $this->doHttpRequest("post",$this->clientTokenUrl, $data);
		return $rs;
	}

	public function getState(){
		return $this->state;
	}
}
