<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *	客户数据填充
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Customer::class)->times(100)->create();
    }
}
