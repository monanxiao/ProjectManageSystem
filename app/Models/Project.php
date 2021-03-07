<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Project extends Model
{

    //时间转换
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    
	/**
     * 应进行类型转换的属性
     *
     * @var array
     */
    protected $casts = [
        'projectPeriod' => 'array',
        'attachList' => 'array',
    ];

    /**
     * 可以被批量赋值的属性。
     *数据白名单
     * @var array
     */
    protected $fillable = ['projectName','customer_id','estimatedPrice','realPrice','prepayPrice','versions','actuaTime','projectPeriod'];

    //客户关联 一对一
    public function consumers(){

        return $this->hasOne('App\Models\Customer','id','customer_id');
    }

}
