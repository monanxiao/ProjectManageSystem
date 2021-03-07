<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Bill;
use App\Observers\BillObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //注册观察者
        Bill::observe(BillObserver::class);//订单创建观察注册
    }
}
