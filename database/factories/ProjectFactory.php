<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {

		//添加时间
		$date_time = $faker->date . ' ' . $faker->time;

		// 预估金额
		$ygprice = $faker->randomFloat(2, 100, 100000);

		$sjprice = $faker->randomFloat(2, 100, $ygprice);

		//结束时间
		$stoptime =  $faker->date("Y-m-d H:i:s", 'now');

		//开始时间
		$startime = $faker->date("Y-m-d H:i:s", $stoptime);

	    return [
		        'projectName' 		=> $faker->company, //项目名称
		        'estimatedPrice' 	=> $ygprice, //预估金额
		        'realPrice' 		=> $sjprice, //实际金额
		        'prepayPrice' 		=> $faker->randomFloat(2, 100, $sjprice), //预付金额
		        'versions' 			=> $faker->randomFloat(2, 1,100), //版本号
		        'actuaTime' 		=> $faker->dateTimeBetween($startime,$stoptime,'PRC'), //实际完成时间
		        'projectPeriod' 	=> json_encode(['startime' => $startime,'stoptime' => $stoptime ]), //开始-结束时间
		        'created_at'	=> $date_time //添加时间
	    ];
});
