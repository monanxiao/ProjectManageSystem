<?php

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Customer;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// 获取 Faker 实例
        $faker = app(Faker\Generator::class);

    	$customerId = Customer::pluck('id')->toArray();//获取所有用户id
		$projectstatus = [0,1,2,3,4];//项目状态

    	$projects = factory(Project::class)
	    			->times(300)
	    			->make()
	    			->each(function($project,$index) use ($customerId,$projectstatus,$faker){

	    				$project->customer_id = $faker->randomElement($customerId);//客户ID
	    				$project->implementStatus = $faker->randomElement($projectstatus);//项目状态

	    			});

	    $data = $projects->toArray();//转为数组
	    
	    //数据入库
	    Project::insert($data);

    }
}
