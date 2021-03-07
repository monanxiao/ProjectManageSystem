<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

	// $user = Auth::guard('admin')->user();
 //    		dd($user);
    return view('welcome');
});



//提醒服务
Route::get('send/{type}/{remindserver}','ServerRemindSendController@tosend')->name('send.type.remindserver');

//namespace 命名空间
// prefix 路由前缀
//group 路由分组
//后台路由分组
Route::namespace('Admin')->prefix('admin')->group(function(){

	// Route::resource('home','AdminController');

	//后台-首页
	Route::get('/','AdminPagesController@index')->name('home');

	//后台-客户档案
	Route::resource('consumer','AdminConsumerController');

	//后台-项目管理
	Route::resource('project','AdminProjectController');

	//文件上传查看等
	Route::prefix('file')->group(function(){

		//附件获取
		Route::get('all/{project}','AdminFileController@filelist')->name('file.all.project');

		//接收项目文件上传
		Route::post('store/project/{project}','AdminFileController@projectStore')->name('file.store.project');

		//接收财务附件上传
		Route::post('store/bill/{bill}','AdminFileController@billStore')->name('file.store.bill');

		//删除图片
		Route::delete('delete/{attach}/{project}','AdminFileController@destroy')->name('file.delete.attach.project');

	});


	//财务账单
	Route::resource('bill','AdminBillController');


	//提醒服务
	Route::resource('remindserver','AdminRemindServersController');

	//登录、退出功能
	Route::prefix('login')->group(function(){

		//后台-登录静态页面
		Route::get('/','AdminLoginController@index')->name('login');

		//后台登录
		Route::post('store','AdminLoginController@store')->name('login');

		//用户退出
		Route::delete('logout','AdminLoginController@destroy')->name('logout');

	});
	
	//系统配置
	Route::prefix('system')->group(function(){

		//后台附件配置-静态页面
		Route::get('attach','AdminPagesController@attachpage')->name('system.attach');

		//后台短信配置-静态页面
		Route::get('sms','AdminPagesController@smspage')->name('system.sms');

		//后台邮箱配置-静态页面
		Route::get('email','AdminPagesController@emailpage')->name('system.email');

		//后台公账号配置-静态页面
		Route::get('offiaccount','AdminPagesController@offiaccountpage')->name('system.offiaccount');

		//后台小程序配置-静态页面
		Route::get('miniprogram','AdminPagesController@miniprogrampage')->name('system.miniprogram');

		//后台微信支付配置-静态页面
		Route::get('wechatpay','AdminPagesController@wechatpaypage')->name('system.wechatpay');

		//更新系统参数
		Route::post('update','AdminSystemController@update')->name('system.update');

	});
	
});

//微信相关路由
Route::prefix('wechat')->group(function(){

	//支付
	Route::get('wxpay','HomeController@wxpay');
	//微信事件处理
	Route::any('/','WechatController@serve')->name('wechat');
	//微信扫码支付
	Route::get('native','WechatController@native');
	//微信支付回调地址
	Route::any('payments','WechatController@pay');
});

