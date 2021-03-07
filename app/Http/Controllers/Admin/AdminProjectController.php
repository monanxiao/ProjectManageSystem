<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Bill;
use Log;

class AdminProjectController extends Controller
{

    protected $project;

    public function __construct(Project $project){

        $this->project = $project;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //取出数据
        $project = $this->project
                    ->select(['id','projectName','customer_id','estimatedPrice','realPrice','prepayPrice','versions','projectPeriod','implementStatus','actuaTime','attachedFiles'])
                    ->orderBy('id','desc')
                    ->paginate(15);

        return view('admin.project.home',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //客户档案取出
        $customer = Customer::select('id', 'customerName')->get();

        return view('admin.project.add',compact('customer'));
    }

    /**
     * 接受项目创建数据
     *
     * projectName 项目名称
     * customer_id 客户ID
     * estimatedPrice 预估金额
     * realPrice 实际金额
     * prepayPrice 预付金额
     * versions 项目版本
     * actuaTime 实际完成时间
     * projectPeriod 开始/结束时间 = begindate 开始时间 ~ finishdate 结束时间
     * 
    */
    public function store(Request $request)
    {
        //接收数据
        $data = $request->only(['projectName','customer_id','estimatedPrice','realPrice','prepayPrice','versions','actuaTime']);

        //开始结束时间
        $data['projectPeriod'] = ['startime'=>$request->begindate,'stoptime'=>$request->finishdate];

        //项目数据入库
        $project = $this->project->create($data);

        $bill['BillName'] = '【项目】' . $project->projectName;//财务名称记录
        $bill['customer_id'] =  $project->customer_id;//付款人id
        $bill['earningPrice'] = $project->prepayPrice;//收款金额
        $bill['earningAnnotation'] = '【项目】' . $project->projectName . '的账单记录';//收款注释
        $bill['projectServerId'] = ['projectId' => $project->id];//所属项目id

        //账单入库            
        $bill = Bill::create($bill);


        return redirect('admin/project');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {

        //客户档案取出
        $customer = Customer::select('id', 'customerName')->get();

        return view('admin.project.edit',compact('project','customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //接收数据
        $data = $request->all();
        //开始结束时间
        $data['projectPeriod'] = ['startime'=>$request->begindate,'stoptime'=>$request->finishdate];

        $project->update($data);

        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //删除数据
        $project->delete();
        
        return redirect()->route('project.index');
    }
}
