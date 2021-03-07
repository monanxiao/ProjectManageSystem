<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Bill;
use DB;

class AdminPagesController extends Controller
{   

    //鉴权 验证用户是否登录
    public function __construct(){

        // $this->middleware('auth:admin',[

        //     // 'except' => ['index'], // 未登录访问
        //     // 'only'  =>['home'] //登录才能访问
        // ]);
    }

    //后台首页
    public function index(){

        //月份账单流水统计
        $billprice = Bill::whereRaw('date_format(earningTime,\'%Y-%m\')',date('Y-m'))//限制当月
                            ->sum('earningPrice');
        //月份总收入
        $billearning = Bill::where('earningStatus',1)
                            ->whereRaw('date_format(earningTime,\'%Y-%m\')',date('Y-m'))//限制当月
                            ->sum('earningPrice');

        return view('admin.home',compact('billprice','billearning'));
    }

    //附件上传
    public function attachpage(){

    	return view('admin.system.attach');
    }

    //短信
    public function smspage(){

    	return view('admin.system.sms');
    }

    //邮箱
    public function emailpage(){

    	return view('admin.system.email');
    }

    //公众号
    public function offiaccountpage(){

    	return view('admin.system.offiaccount');
    }

    //小程序
    public function miniprogrampage(){

    	return view('admin.system.miniprogram');
    }

    //微信支付
    public function wechatpaypage(){

        return view('admin.system.wechatpay');
    }
}
