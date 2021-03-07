<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\Project;
use App\Models\RemindServer;
use DB;
use Log;

class AdminBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Bill $bill)
    {
        //取出账单数据
        $billdata = $bill->orderByRaw(DB::raw('FIELD(earningStatus,0) desc'))
                            ->orderByRaw(DB::raw('FIELD(earningStatus,1) desc'))
                            ->orderByRaw(DB::raw('FIELD(earningStatus,2) desc'))
                            ->orderByRaw(DB::raw('FIELD(earningStatus,3) desc'))
                            ->orderBy('id','desc')
                            ->paginate(15);

        return view('admin.bill.home',compact('billdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //客户档案取出
        $customer = Customer::select('id', 'customerName')->get();
        //所属项目
        $project = Project::select(['id','projectName'])->get();
        //所属服务
        $server = RemindServer::select(['id','serverName'])->get();

        return view('admin.bill.add',compact('customer','project','server'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收数据字段
        $data = $request->only(['BillName','customer_id','EarningMode','earningTime','earningPrice','earningAnnotation']);

        //接收服务/项目 字段
        $data['projectServerId'] = ['projectId'=>$request->project_id ,'serverId'=>$request->server_id];

        Bill::create($data);//数据入库

        return redirect()->route('bill.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {   

        //客户档案取出
        $customer = Customer::select('id', 'customerName')->get();   
        //所属项目
        $project = Project::select(['id','projectName'])->get();
        //所属服务
        $server = RemindServer::select(['id','serverName'])->get();


        return view('admin.bill.edit',compact('bill','customer','project','server'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //接收更新数据
        $data = $request->only(['BillName','customer_id','EarningMode','earningTime','earningPrice','earningAnnotation']);

        //接收服务/项目 字段
        $data['projectServerId'] = ['projectId'=>$request->project_id ,'serverId'=>$request->server_id];

        //更新数据
        $bill->update($data);

        return redirect()->route('bill.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
