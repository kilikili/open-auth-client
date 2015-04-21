<?php

namespace Kilikili\Auth\Client\Provider\Openid;

use Closure;
use Kilikili\Auth\Client\Provider\AbstractProvider as BaseProvider;
//use Lightopenid\openid;

abstract class AbstractProvider extends BaseProvider
{
	protected $scopes;
	protected $openidRealm;
	protected $adapterOpenid;

	public function __construct($argu, $custData = array(), $custRData = array()){
		parent::__construct($argu, $custData , $custRData);
		$this->trustRoot = $argu['openidRealm'];
		$this->adapterOpenid = new \LightOpenID($this->trustRoot);
	}

	public function run(){
		$openid = $this->adapterOpenid;
		$openid->returnUrl = $this->redirectUri;
		$openid->identity = $this->myOpenId;
		$url = $openid->authUrl();

		header("Location: " . $url);
	}

	public function receive($result){
		#驗證登入狀況
		$openid = $this->adapterOpenid;
		$validateCode = $openid->validate();
		$identity = $openid->identity;

		$data['openid_identity'] = $result['openid_identity'];
		$data['openid_mode'] = $result['openid_mode'];
		//$data = array_merge($data,$custRData);

		if(1 == $validateCode){
			//由 openId 回來成功
			print_r($result);
		}else{
			echo "驗證失敗，需重新登入!!";
		}
	}
}
