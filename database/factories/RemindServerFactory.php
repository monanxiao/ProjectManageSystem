<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\RemindServer;
use Faker\Generator as Faker;


$factory->define(RemindServer::class, function (Faker $faker) {

	$date_time = $faker->date . ' ' . $faker->time;//添加时间
	$stoptime =  $faker->date("Y-m-d H:i:s", 'now');//结束时间
	
	$startime = $faker->date("Y-m-d H:i:s", $stoptime);//开始时间
	
    return [

        'serverName' => $faker->catchPhrase,//服务名称
        'serverPrice' => $faker->randomFloat(2, 100, 100000),//预估价格
        'serverPeriod' => json_encode(['startime' => $startime,'stoptime' => $stoptime ]),//开始/结束时间
        'smsTime' => $faker-> randomNumber(3,true),//通知短信次数
        'emailTime' => $faker-> randomNumber(3,true),//通知邮件次数
        'wechatTime' => $faker-> randomNumber(3,true),//通知微信次数
        'created_at' => $date_time,//添加时间
    ];
});
