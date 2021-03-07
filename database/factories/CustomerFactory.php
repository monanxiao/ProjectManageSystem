<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {

	$date_time = $faker->date . ' ' . $faker->time;//随机时间

    return [

        'customerName'	=>	$faker->name,	//客户姓名
        'address'		=>	['state' => $faker->state,'city' => $faker->city,'address' => $faker->streetAddress],	//客户地址
        'contactWay'	=>	['email' => $faker->unique()->email,'phone' => $faker->unique()->phoneNumber,'qq'=>$faker->randomDigitNotNull],	//联系方式
        'created_at'	=>	$date_time,	//创建时间
    ];

});
