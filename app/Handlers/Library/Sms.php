<?php 
namespace App\Handlers\Library;

class Sms{

	const SENDURL = 'http://utf8.api.smschinese.cn/';//短信发送接口
	const SMSURL = 'http://www.smschinese.cn/web_api/SMS/?Action=SMS_Num';//短信查询接口

	protected $account;

	public function __construct(){
		
		//发送账户
		$this->account = ['Uid' => env('SMSUID'),'Key' => env('SMSKEY')];
	}

	//发送短信 $phone 手机号  $content 发送文本
	public function sendSms($phone,$content){

		//拼接url发送链接
		$url = self::SENDURL . '?Uid=' . implode('&Key=', $this->account) . '&smsMob=' . $phone . '&smsText=' . $content;

		$url = urldecode($url);//url编码
		return $this->geturl($url);
	}

	//短信剩余数量查询
	public function smsNumber(){

		//拼接url
		$url = self::SMSURL . '&Uid=' . implode('&Key=', $this->account);//发送链接
		
		return $this->geturl($url);
	}

	//执行发送
	public function geturl($url){

		$ch = curl_init();
		$timeout = 5;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_contents = curl_exec($ch);
		curl_close($ch);

		return $file_contents;
	}
}
