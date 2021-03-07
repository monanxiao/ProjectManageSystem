<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bill;
use Faker\Generator as Faker;

$factory->define(Bill::class, function (Faker $faker) {
    return [
        //
        'BillName' => $faker->text(10),//账单名称
        'earningTime' => $faker->time('Y-m-d H:i:s', 'now'),//收款时间
        'earningPrice' => $faker->randomFloat(2, 100, 100000),//收款金额
        'earningAnnotation' => $faker->text(15)//注释内容
    ];
});
