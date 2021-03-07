<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{


	/**
     * 应进行类型转换的属性
     *
     * @var array
     */
    protected $casts = [
        'address' => 'array',
        'contactWay' => 'array',
    ];

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['customerName','address','contactWay'];
}
