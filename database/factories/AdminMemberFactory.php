<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AdminMember;
use Faker\Generator as Faker;

$factory->define(AdminMember::class, function (Faker $faker) {

	$date_time = $faker->date . ' ' . $faker->time;//随机时间

    return [
        //
        'username' => $faker->userName,//账户
        'password' => bcrypt($faker->password),//密码
        'realname' => $faker->name,//真实姓名
        'email' => $faker->unique()->email,//邮箱
        'mobile' => $faker->unique()->phoneNumber,//手机号
        'created_at' => $date_time //添加日期
    ];
});
