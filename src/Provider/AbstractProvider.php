<?php

namespace Kilikili\Auth\Client\Provider;

abstract class AbstractProvider
{
	protected $clientId;
	protected $clientSecure;
	protected $redirectUri;
	protected $customerData = array();
	protected $customerRData = array();
	abstract public function run();
	abstract public function receive($result);

	public function __construct($argu, $custData = array(), $custRData = array()){
		$this->setCustData($custData);
		$this->setCustRData($custRData);
		foreach($argu as $key => $val){
			$this->$key = $val;
		}
	}
	
	protected function setCustData($custData = array()){
		$this->customerData = array_merge($this->customerData, $custData);
		return $this->customerData;
	}

	protected function setCustRData($custRData = array()){
		$this->customerRData = array_merge($this->customerRData, $custRData);
		return $this->customerRData;
	}

	protected function doHttpRequest($method, $apiUrl, $data, $headers = array()){
		$curl 		= curl_init();
		
		$headers = array_merge($headers,array('Content-Type: application/x-www-form-urlencoded'));
		//print_r($headers);
		$dataStr = http_build_query($data);
		if($method == "get"){
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_URL, $apiUrl);
		}else{
			//curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($curl, CURLOPT_URL, $apiUrl);
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $dataStr);
			//echo $dataStr;
		}

		//var_dump($dataStr);
		//die();
		//echo http_build_query($data);

		curl_setopt($curl, CURLOPT_HTTPHEADER,	 $headers);
		//curl_setopt($curl, CURLOPT_USERAGENT,		 'anyMeta/OAuth 1.0 - ($LastChangedRevision: 174 $)');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($curl, CURLOPT_HEADER, 		 true);
		//curl_setopt($curl, CURLOPT_TIMEOUT, 		 30);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLINFO_HEADER_OUT, true);
		$rs = curl_exec($curl);
		/*$headers = curl_getinfo($curl, CURLINFO_HEADER_OUT);
		echo "<br><br>";
		var_dump($headers);
		echo "<br><br>";*/
		curl_close($curl);
		return $rs;
	}
}
