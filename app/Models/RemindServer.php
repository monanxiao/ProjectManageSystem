<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class RemindServer extends Model
{
        
    //时间转换
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    //转json
	/**
     * 应进行类型转换的属性
     *
     * @var array
     */
    protected $casts = [
        'serverPeriod' => 'array',//开始结束时间
        'remind' => 'array',//提醒方式
    ];

    //字段白名单
    /**
     * 可以被批量赋值的属性。
     *数据白名单
     * @var array
     */
    protected $fillable = ['serverName','remind','project_id','customer_id','serverPrice','smsTime','emailTime','wechatTime','serverPeriod'];


    //关联客户 一对一
    public function consumers(){

        return $this->hasOne('App\Models\Customer','id','customer_id');
    }

    //关联项目 一对一
    public function items(){

        return $this->hasOne('App\Models\Project','id','project_id');
    }
}
