<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class HomeController extends Controller
{   

    public function wxpay(){


    	// $app = Factory::payment(config('wechat.payment.default'));

    	$app = wechatType('payment');//实例化支付

    	$data = [
				    'body' => '腾讯充值中心-QQ会员充值',
				    'out_trade_no' => date('YmdHis') . time(),
				    'total_fee' => 179,
				    'trade_type' => 'NATIVE', // 请对应换成你的支付方式对应的值类型
				    'openid' => 'oL3smv87g2CpZqpbpoYKckYOerDs',
				    'product_id' => 123131,
				];

		Log::info($data);

    	$isContract = true;

		$result = $app->order->unify($data, $isContract);

    	Log::info($result);
        return $result['code_url'];
    }

}
