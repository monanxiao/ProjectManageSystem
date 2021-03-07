<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class WechatController extends Controller
{	

    //微信扫码支付
    public function native(){

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

    //回调地址
    public function pay(Request $request){

        $app = wechatType('payment');//实例化支付

        $response = $app->handlePaidNotify(function ($message, $fail) {

            Log::info($message);
            Log::info($fail);
            Log::info($request->all());
            
            // 你的逻辑
            return true;
            // 或者错误消息
            $fail('Order not exists.');
        });

        return $response;

    }

    //接收事件
    public function serve(Request $request){

        $app = wechatType('officialAccount');//实例化公众号

        $app->server->push(function ($message) {

            Log::info($message);
            
            switch ($message['MsgType']) {
                case 'event':
                    return $message['Content'];
                    break;
                case 'text':
                    return $message['Content'];
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                case 'file':
                    return '收到文件消息';
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }

        });

        return $app->server->serve();
    }
}
