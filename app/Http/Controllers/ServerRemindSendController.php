<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RemindServer;
use Log;

class ServerRemindSendController extends Controller
{	

	//发送通知
	public function tosend($type,RemindServer $remindserver){

		
		$data = ServerInform($type,$remindserver);//传入数据

		$data = json_encode($data);

		Log::info($data);
		return $data;
	}
}
