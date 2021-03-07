<?php 

use App\Models\SystemSet;
use App\Handlers\Library\Wechat;
use App\Handlers\Library\SendInform;
use App\Handlers\Library\Sms;



/*
*
*
* 短信剩余条数
*
* 作者： 墨楠
* 邮箱： monanxiao@qq.com	
* 联系QQ: 3528419209
* 时间：2021/03/05
*
*/
function smsnum(){

	$sms = new Sms();
	return $sms->smsNumber();
}

/*
*
*
* 服务通知
*
* 作者： 墨楠
* 邮箱： monanxiao@qq.com	
* 联系QQ: 3528419209
* 时间：2021/03/02
*
* type 发送类型：微信 邮箱 短信 all=全部
* data 实例数据
*
*/
function ServerInform($type,$data){

	//实例化通知
	$sendinform = new SendInform($type,$data);

	return $sendinform;
}

/*
*
*
* 系统参数公共调用方法
*
* 作者： 墨楠
* 邮箱： monanxiao@qq.com	
* 联系QQ: 3528419209
* 时间：2021/03/02
*
*/

//系统参数 $key:键
function systemDataStore($key,$value){

	//数据存在则更新,不存在则创建
	$data = SystemSet::updateOrCreate(
										['key' => $key],
										['value'=>$value]
									);

	return $data;
}

//获取系统参数值
function systemGet($key){

	return SystemSet::where('key', $key)->value('value');
	
}

//微信调用 公众号、小程序、微信支付、开放平台等
function wechatType($type){

	$wechat = new Wechat();

	return $wechat->$type();
}

//更新公众号、短信、邮箱等env配置数据
 function modifyEnv(array $data) 
{	
	//env 文件路径
 	$envPath = base_path() . DIRECTORY_SEPARATOR . '.env';
 	
 	$contentArray = collect(file($envPath, FILE_IGNORE_NEW_LINES));

	 $contentArray->transform(function ($item) use ($data){
	   foreach ($data as $key => $value){
	    if(str_contains($item, $key)){
	     return $key . '=' . $value;
	    }
	   }
	   return $item;
	  });

 	$content = implode("\n", $contentArray->toArray());
 	
 	return \File::put($envPath, $content);
}