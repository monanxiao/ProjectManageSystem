<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    //后台登录
    public function login(){

    	return view('admin.login');
    }

}
