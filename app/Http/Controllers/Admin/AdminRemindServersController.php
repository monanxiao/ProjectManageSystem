<?php

namespace App\Http\Controllers\Admin;

use App\Models\RemindServer;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Project;
use App\Models\Bill;
use Log;
use DB;

class AdminRemindServersController extends Controller
{

    protected $remindserver;

    public function __construct(RemindServer $remindserver){

        $this->remindserver = $remindserver;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        //数据统计
        $datastat = $this->remindserver
                            ->select('serverStatus',DB::raw('count(*) as num'))
                            ->groupBy('serverStatus')
                            ->get();
        //通知次数统计
        $times = $this->remindserver->select(
                                    DB::raw('sum(smsTime) as smsnum'),
                                    DB::raw('sum(emailTime) as emailnum'),
                                    DB::raw('sum(wechatTime) as wechatnum'),
                                    DB::raw('sum(smsTime) + sum(emailTime) + sum(wechatTime) as timenum'),
                                    )
                                ->first();

        //取出数据 并分页
        $remindserver = $this->remindserver
                                ->orderByRaw(DB::raw('FIELD(serverStatus, 2) desc'))
                                ->orderByRaw(DB::raw('FIELD(serverStatus, 0) desc'))
                                ->orderByRaw(DB::raw('FIELD(serverStatus, 1) desc'))
                                ->orderByRaw(DB::raw('FIELD(serverStatus, 3) desc'))
                                ->orderBy('id','desc')
                                ->paginate(15);


        return view('admin.remindserver.home',compact('remindserver','datastat','times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //取出客户数据
        $consumer = Customer::select(['id','customerName'])->get();
        $project = Project::select(['id','projectName'])->get();

        //服务创建页面
        return view('admin.remindserver.add',compact('consumer','project'));
    }

    /**
     * 接受服务创建数据
     *
     * serverName 服务名称
     * project_id 项目ID  
     * customer_id 客户ID
     * serverPrice 服务金额
     * project_id 或 customer_id 必须有一个
     * 
    */
    public function store(Request $request)
    {
        //接收数据
        $data = $request->only(['serverName','project_id','customer_id','serverPrice']);

        //开始结束时间
        $data['serverPeriod'] = ['startime'=>$request->begindate,'stoptime'=>$request->finishdate];

        //提醒方式
        $data['remind'] = ['email' => $request->email ,'sms' => $request->sms ,'wechat' => $request->wechat];
        
        //数据入库
        $reminserver = $this->remindserver->create($data);

        $bill['BillName'] = '【服务】' . $reminserver->serverName;//财务名称记录
        $bill['customer_id'] =  $reminserver->customer_id;//付款人id
        $bill['earningPrice'] = $reminserver->serverPrice;//收款金额
        $bill['earningAnnotation'] = '【服务】' . $reminserver->projectName . '的账单记录';//收款注释
        $bill['projectServerId'] = ['serverId' => $reminserver->id];//所属服务id

        //账单入库            
        $bill = Bill::create($bill);

        return redirect()->route('remindserver.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RemindServer  $remindServer
     * @return \Illuminate\Http\Response
     */
    public function show(RemindServer $remindServer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RemindServer  $remindServer
     * @return \Illuminate\Http\Response
     */
    public function edit(RemindServer $remindServer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RemindServer  $remindServer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RemindServer $remindServer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RemindServer  $remindServer
     * @return \Illuminate\Http\Response
     */
    public function destroy(RemindServer $remindServer)
    {
        //
    }
}
