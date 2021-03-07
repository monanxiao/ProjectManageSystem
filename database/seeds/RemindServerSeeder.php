<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Project;
use App\Models\RemindServer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class RemindServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = app(Faker\Generator::class);//实例化填充数据方法
        $customers = Customer::pluck('id');//取出现有客户ID
        $projects = Project::pluck('id');//取出现有项目ID
        $serverstatus = [0,1,2,3]; //服务状态码

        $remindserver = factory(RemindServer::class)
				        	->times(500)
				        	->make()
				        	->each(function($remindservers,$index) use ($customers,$projects,$serverstatus,$faker){
				        		
				        		$remindservers->customer_id = $faker->randomElement($customers);//客户随机ID
				        		$remindservers->project_id = $faker->randomElement($projects);//项目随机ID
				        		$remindservers->serverStatus = $faker->randomElement($serverstatus);//服务状态

				        	});

		$data = $remindserver->toArray();//转数组

		//数据入库
		RemindServer::insert($data);
    }
}
