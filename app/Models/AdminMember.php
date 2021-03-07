<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdminMember extends Authenticatable
{	
	use Notifiable;

    //隐藏字段
    protected $hidden = [ 
        'password', 'remember_token', 
    ]; 
}
