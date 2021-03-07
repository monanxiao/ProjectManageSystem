<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ConsumerRequest;
use App\Models\Customer;

class AdminConsumerController extends Controller
{	

	/*
	*
	*客户实例
	*
	*/
	protected $customer;

	/*
	*
	*
	*创建客户模型实例
	*	
	*/

	public function __construct(Customer $customer){

		$this->customer = $customer;
	}


    //客户档案管理
    public function index(){

    	$customer = $this->customer->orderBy('id','desc')->paginate(15);

    	return view('admin.consumer.home',compact('customer'));
    }

    //客户新增
    public function create(){

    	return view('admin.consumer.add');
    }

    //编辑页面
    public function edit(Customer $consumer){

    	return view('admin.consumer.edit',compact('consumer'));
    }


    //接收客户新增数据
    public function store(ConsumerRequest $request){

    	//数据白名单
		$data = $request->only(['customerName']);

		//联系地址
    	$data['address'] = ['state'=>$request->state,'city'=>$request->city,'address'=>$request->address];
        //联系方式
        $data['contactWay'] = ['phone'=>$request->phone,'email'=>$request->email,'qq'=>$request->qq];

    	//数据入库
    	$this->customer->create($data);

    	return redirect('admin/consumer');
    
    }

    //更新用户数据
    public function update(ConsumerRequest $request,Customer $consumer){


    	//数据白名单
		$data = $request->only(['customerName','contactWay']);

		//联系地址
    	$data['address'] = [$request->provincecity,$request->districtscounties];
    	
    	//更新用户信息
    	$consumer->update($data);

    	//更新成功后返回客户档案列表页面
    	return redirect()->route('consumer.index');
    	// return redirect()->route('topics.show', $topic->id)->with('success', '更新成功！');
    }

    //删除数据
    public function destroy(Customer $consumer){

    	$consumer->delete();//删除数据

    	return back();
    }
}
