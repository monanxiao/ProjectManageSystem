<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SystemSet;

class AdminSystemController extends Controller
{
    //系统设置页
    public function index(){

    	return view('admin.system.home');
    }

    //更新系统参数
    public function update(Request $request){

        //接收系统参数
        $data = $request->except(['_token']);

        // 使用函数更新
        $status  = modifyEnv($data);

        return back();
    	

    	// //遍历数据 更新或创建
    	// foreach ($data as $k => $v) {
    		
    	// 	//执行系统方法
    	// 	systemDataStore($k,$v);
    	// }

    	// return back();
    }
}
