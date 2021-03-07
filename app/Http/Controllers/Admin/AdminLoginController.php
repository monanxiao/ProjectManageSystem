<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AdminMember;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{	

	//鉴权 验证用户是否登录
	public function __construct(){

		$this->middleware('auth:admin',[

			'except' =>['index','store'],// 除了index以外必须要登陆
		]);

		$this->middleware('guest:admin',[

			'only'	=> ['index']	//只有未登录用户才能访问

		]);
	}


	//后台登录界面
    public function index(){

    	return view('admin.login');
    }

    //用户登录参数接收
    public function store(Request $request,AdminMember $admin)
    {

    	$admin = ['username' => $request->account, 'password' => $request->password];

    	//检测是否登录
    	if(Auth::guard('admin')->check()){

    		return redirect('admin');

    	}else{

    		//登录此用户
    		Auth::guard('admin')->attempt($admin,$request->has('remember'));

    		return redirect('admin');
    	}

    }

    //用户退出
    public function destroy(){

    	Auth::guard('admin')->logout();//退出登录

    	return redirect('admin/login');
    }
}
