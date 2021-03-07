<?php 

namespace App\Handlers\Library;

use EasyWeChat\Factory;

class Wechat{

	//公众号
	public function officialAccount(){

		return Factory::officialAccount(config('wechat.official_account.default'));
	}

	//小程序
	public function miniProgram(){

		return Factory::miniProgram(config('wechat.mini_program.default'));
	}

	//开放平台
	public function openPlatform(){

		return Factory::openPlatform(config('wechat.open_platform.default'));
	}

	// 微信支付
	public function payment(){

		return Factory::payment(config('wechat.payment.default'));
	}

	//企业微信
	public function work(){

		return Factory::work(config('wechat.work.default'));
	}

	//企业微信开放平台
	// public function openWork(){

	// 	return app('wechat.payment');
	// }

}