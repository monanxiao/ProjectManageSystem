<?php

use Illuminate\Database\Seeder;
use App\Models\Bill;
use App\Models\Project;
use App\Models\RemindServer;
use App\Models\Customer;
use Illuminate\Support\Str;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        $customerId = Customer::pluck('id')->toArray();//获取所有用户id
        $projectId = RemindServer::pluck('id')->toArray();//获取所有项目id
        $serverId = Project::pluck('id')->toArray();//获取所有服务id
        $paytype = ['支付宝','微信','银行卡'];//收矿方式

        $bill = factory(Bill::class)
        			->times(100)
        			->make()
        			->each(function($bills,$index) use ($customerId,$projectId,$serverId,$paytype,$faker){

        				$bills->BillNumber =  strtoupper(Str::random(2)) . date('YmdHi')  . $faker->randomDigitNotNull .$faker->randomDigitNotNull .$faker->randomDigitNotNull.$faker->randomDigitNotNull;
        				$bills->customer_id = $faker->randomElement($customerId);
                        $bills->earningStatus = $faker->randomElement([0,1,2,3]);
        				$bills->EarningMode = $faker->randomElement($paytype);
        				$bills->projectServerId = json_encode([
			        											'projectId'=>$faker->randomElement($projectId) ,
			        											'serverId'=>$faker->randomElement($serverId)
        													]);

        			});


        $data = $bill->toArray();//转数组
        
        Bill::insert($data);//数据入库		


    }
}
