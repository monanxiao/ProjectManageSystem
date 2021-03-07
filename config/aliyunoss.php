<?php 

   /* 城市名称：
   *  
   *  内外网络下可选：杭州、上海、青岛、北京、张家口、呼和浩特、乌兰察布、深圳、河源、广州、香港、硅谷、弗吉尼亚、新加坡
   *  、悉尼、吉隆坡、雅加达、日本、孟买、法兰克福、伦敦、迪拜
   *  
   */

return [

	//oss所在地区 如:华北2(北京) 只填写括号内“北京”即可
	'city' => env('OSS_CITY','北京'), //北京
	//http请求方式：“http” 或 “https”
	'gettype' => env('OSS_GET_TYPE','http'), //https
	 //可选：“外网” 或 “内网”  如果您是ECS用户，建议使用内网地址访问同地域的OSS。同地域的 ECS 通过该域名免费访问 OSS 产生的内网流入、流出流量
	'networkType' => env('OSS_NETWORK_TYPE','外网'),//外网
	// 存储空间名称
	'bucket' => env('OSS_BUCKET',''), 
	//AccessKeyId AccessKeySecret 获取地址:https://usercenter.console.aliyun.com/#/manage/ak
	// 你的AccessKeyId 
	'AccessKeyId' => env('OSS_AccessKeyId',''),//LTAI4GHqSp4SKdorxJpagSMc
	//你的AccessKeySecret
	'AccessKeySecret' => env('OSS_AccessKeySecret',''),//cnvvn9mVeFbsyfMymB7rdVBck4tieh

	//公共云下OSS各地域查看地址：https://help.aliyun.com/document_detail/31837.htm
	//外网公共云下OSS各地域
	'CityURLArray'	=>
	[
	    '杭州' => 'oss-cn-hangzhou',
	    '上海' => 'oss-cn-shanghai',
	    '青岛' => 'oss-cn-qingdao',
	    '北京' => 'oss-cn-beijing',
	    '张家口' => 'oss-cn-zhangjiakou',
	    '呼和浩特' => 'oss-cn-huhehaote',
	    '乌兰察布' => 'oss-cn-wulanchabu',
	    '深圳' => 'oss-cn-shenzhen',
	    '河源' => 'oss-cn-heyuan',
	    '广州' => 'oss-cn-guangzhou',
	    '成都' => 'oss-cn-chengdu',
	    '香港' => 'oss-cn-hongkong',
	    '硅谷' => 'oss-us-west-1',
	    '弗吉尼亚' => 'oss-us-east-1',
	    '新加坡' => 'oss-ap-southeast-1',
	    '悉尼' => 'oss-ap-southeast-2',
	    '吉隆坡' => 'oss-ap-southeast-3',
	    '雅加达' => 'oss-ap-southeast-5',
	    '日本' => 'oss-ap-northeast-1',
	    '孟买' => 'oss-ap-south-1',
	    '法兰克福' => 'oss-eu-central-1',
	    '伦敦' => 'oss-eu-west-1',
	    '迪拜' => 'oss-me-east-1',
  	],

  	//内网公共云下OSS各地域
  	'CityURLArrayForVPC' => 
  	[
	    '杭州' => 'oss-cn-hangzhou-internal',
	    '上海' => 'oss-cn-shanghai-internal',
	    '青岛' => 'oss-cn-qingdao-internal',
	    '北京' => 'oss-cn-beijing-internal',
	    '张家口' => 'oss-cn-zhangjiakou-internal',
	    '呼和浩特' => 'oss-cn-huhehaote-internal',
	    '乌兰察布' => 'oss-cn-wulanchabu-internal',
	    '深圳' => 'oss-cn-shenzhen-internal',
	    '河源' => 'oss-cn-heyuan-internal',
	    '广州' => 'oss-cn-guangzhou-internal',
	    '成都' => 'oss-cn-chengdu-internal',
	    '香港' => 'oss-cn-hongkong-internal',
	    '硅谷' => 'oss-us-west-1-internal',
	    '弗吉尼亚' => 'oss-us-east-1-internal',
	    '新加坡' => 'oss-ap-southeast-1-internal',
	    '悉尼' => 'oss-ap-southeast-2-internal',
	    '吉隆坡' => 'oss-ap-southeast-3-internal',
	    '雅加达' => 'oss-ap-southeast-5-internal',
	    '日本' => 'oss-ap-northeast-1-internal',
	    '孟买' => 'oss-ap-south-1-internal',
	    '法兰克福' => 'oss-eu-central-1-internal',
	    '伦敦' => 'oss-eu-west-1-internal',
	    '迪拜' => 'oss-me-east-1-internal',
  	],

];