<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(CustomersSeeder::class);//填充客户数据
        $this->call(ProjectSeeder::class);//填充项目数据
        $this->call(RemindServerSeeder::class);//填充提醒服务数据
        $this->call(AdminMemberSeeder::class);//填充管理账户
        $this->call(RemindServerSeeder::class);//填充服务提醒
        $this->call(BillSeeder::class);//填充账单
        
    }
}
