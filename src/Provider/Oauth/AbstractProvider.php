<?php

namespace Kilikili\Auth\Client\Provider\Oauth;

use Closure;
use Kilikili\Auth\Client\Provider\AbstractProvider as BaseProvider;

abstract class AbstractProvider extends BaseProvider
{
	protected $scopes;
	protected $clientAuthUrl;
	protected $clientRequestTokenUrl;
	protected $clientAccessTokenUrl;
	protected $xoauth = array();

	public function __construct($argu, $custData = array(), $custRData = array()){
		parent::__construct($argu, $custData, $custRData);
		session_start();
	}

	public function run(){
	    // If we don't have an authorization code then get one
	    $authUrl = $this->getAuthorizationUrl();
	    //die($authUrl);
	    return $authUrl;
	    //header('Location: '.$authUrl);
	    //exit;
	}

	public function receive($result){
		$data = array();
		if(isset($result['oauth_verifier'])){
			$data['oauth_verifier'] = $result['oauth_verifier'];
		}
		$data['oauth_signature_method'] = "HMAC-SHA1";
		$data['oauth_signature'] = "";
		$data['oauth_nonce'] = md5(date("Ymd").rand(1000,9999));
		$data['oauth_timestamp'] = time();
		$data['oauth_token'] = $result['oauth_token'];
		$data['oauth_consumer_key'] = $this->clientId;
		$data['oauth_version'] = "1.0";


		$custAry = $this->customerRData;
		//$scope = "https://www.google.com/base/feeds/";
		//$custAry['scope'] = isset($_GET['scope']) ? $_GET['scope'] : $scope;

		$data = array_merge($data, $custAry);

		$data = array_map(array($this,"urlencodeRFC3986"),$data);

		$method = "post";
		$dataStr = $this->getNormalizedParams($data);
		$tokenSecret = $_SESSION['token_secret'];
		$data['oauth_signature'] = $this->signature($method, $this->clientAccessTokenUrl, $dataStr, $tokenSecret);
		$headers = array($this->getAuthorizationHeader($data));

		//$_SESSION['json_orig'] = json_encode($data);
		$queryStr = http_build_query($custAry);
		$rs = $this->doHttpRequest($method, $this->clientAccessTokenUrl, $queryStr, $headers);
		//echo urldecode($rs);
		parse_str($rs, $ary);
		return $rs;
	}


	private function requestToken(){
		$data['oauth_version'] = "1.0";
		$data['oauth_nonce'] = md5(date("YmdHis").rand(100,999));
		$data['oauth_timestamp'] = time();
		$data['oauth_consumer_key'] = $this->clientId;
		$data['oauth_signature_method'] = "HMAC-SHA1";
		$data['oauth_callback'] = $this->redirectUri;
		$data['oauth_signature'] = "";

		$custAry = $this->customerData;
		$data = array_merge($data, $custAry);
		$data = array_merge($data, $this->xoauth);

		$data = array_map(array($this,"urlencodeRFC3986"),$data);

		$method = "post";
		$dataStr = $this->getNormalizedParams($data);
		$data['oauth_signature'] = $this->signature($method, $this->clientRequestTokenUrl, $dataStr);
		$headers = array($this->getAuthorizationHeader($data));


		//$_SESSION['json_orig'] = json_encode($data);

		$queryStr = http_build_query($custAry);
		$rs = $this->doHttpRequest($method, $this->clientRequestTokenUrl, $queryStr, $headers);
		//echo urldecode($rs);
		parse_str($rs, $ary);
		//var_dump($ary);
		//die();
		$_SESSION['token_secret'] = $ary['oauth_token_secret'];
		$_SESSION['oauth_token'] = $ary['oauth_token'];
		return $ary['oauth_token'];
	}

	private function signature($method, $requestUrl, $dataStr, $tokenSecret = ""){
		$sig 	= array();
		$sig[]	= strtoupper($method);
		$sig[]	= $requestUrl;
		$sig[]	= $dataStr;
		$baseString = implode("&", array_map(array($this,"urlencodeRFC3986"),$sig));

		$token_secret = $tokenSecret;
		$key = $this->urlencodeRFC3986($this->clientSecure).'&'.$this->urlencodeRFC3986($token_secret);
		//die($baseString);
		return $this->urlencodeRFC3986(base64_encode(hash_hmac("sha1", $baseString, $key , true)));
	}

	/**
	 * Check if the request signature corresponds to the one calculated for the request.
	 * 
	 * @param OAuthRequest request
	 * @param string base_string	data to be signed, usually the base string, can be a request body
	 * @param string consumer_secret
	 * @param string token_secret
	 * @param string signature		from the request, still urlencoded
	 * @return string
	 */
	private function verify ( $method, $requestUrl, $dataStr,  $signature ){
		$a = $this->urlencodeRFC3986($signature);
		$b = $this->urlencodeRFC3986($this->signature($method, $requestUrl, $dataStr));

		// We have to compare the decoded values
		$valA  = base64_decode($a);
		$valB  = base64_decode($b);

		// Crude binary comparison
		return rawurlencode($valA) == rawurlencode($valB);
	}

	/**
	 * Builds the Authorization header for the request.
	 * Adds all oauth_ and xoauth_ parameters to the Authorization header.
	 * 
	 * @return string
	 */
	private function getAuthorizationHeader ($data) {
		$h[] = 'Authorization: OAuth realm=""';
		foreach ($data as $name => $value) {
			if (strncmp($name, 'oauth_', 6) == 0 || strncmp($name, 'xoauth_', 7) == 0) {
				$h[] = $name.'="'.$value.'"';
			}
		}
		$hs = implode(', ', $h);
		return $hs;
	}

	private function urlencodeRFC3986($string) {
	   return str_replace('%7E', '~', rawurlencode($string));
	}

	/**
	 * Return the complete parameter string for the signature check.
	 * All parameters are correctly urlencoded and sorted on name and value
	 * 
	 * @return string
	 */
	private function getNormalizedParams($params) {
		$normalized = array();
		$rt = array();

		ksort($params);
		foreach ($params as $key => $value) {
		    // all names and values are already urlencoded, exclude the oauth signature
		    if ($key != 'oauth_signature') {
				if (is_array($value)) {
					$value_sort = $value;
					sort($value_sort);
					foreach ($value_sort as $v) {
						$normalized[] = $key.'='.$v;
						$rt[$key] = $v;
					}
				} else {
					$normalized[] = $key.'='.$value;
					$rt[$key] = $value;
				}
			}
		}
		return rtrim(trim(implode("&", $normalized)));
		//return $rt;
	}

	//public abstract function getAuthorizationUrl();
	private function getAuthorizationUrl(){
		$token = $this->requestToken();
		$apiUrl = $this->clientAuthUrl;

		$data['oauth_token'] = $token;
		$data = array_merge($data,$this->customerData);

		$url = $apiUrl . "?" . http_build_query($data);
		return $url;
	}
}
