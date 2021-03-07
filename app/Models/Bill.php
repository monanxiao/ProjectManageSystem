<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Log;

class Bill extends Model
{
    
    /**
     * 应进行类型转换的属性
     *
     * @var array
     */
    protected $casts = [
        'projectServerId' => 'array',
    ];

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['BillName','customer_id','EarningMode','earningTime','earningPrice','earningAnnotation','projectServerId'];

    //客户关联 一对一
    public function consumers(){

        return $this->hasOne('App\Models\Customer','id','customer_id');
    }

    //关联附件
    public function attachs(){

        return $this->hasOne('App\Models\Attach','id','attache_id');
    }
    //关联服务
    // public function server(){

    //     return $this->hasOne('App\Models\RemindServer','id','projectServerId');
    // }
}
