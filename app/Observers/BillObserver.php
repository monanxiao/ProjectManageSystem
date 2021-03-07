<?php

namespace App\Observers;

use App\Models\Bill;
use Illuminate\Support\Str;

class BillObserver
{   

    //账单数据保存监听增加账单流水号
    public function saving(Bill $bill){
        
        //18位随机流水
        $bill->BillNumber = strtoupper(Str::random(2)) . date('YmdHiss');

    }

    /**
     * Handle the bill "created" event.
     *
     * @param  \App\Models\Bill  $bill
     * @return void
     */
    public function created(Bill $bill)
    {

    }

    /**
     * Handle the bill "updated" event.
     *
     * @param  \App\Models\Bill  $bill
     * @return void
     */
    public function updated(Bill $bill)
    {
        //
    }

    /**
     * Handle the bill "deleted" event.
     *
     * @param  \App\Models\Bill  $bill
     * @return void
     */
    public function deleted(Bill $bill)
    {
        //
    }

    /**
     * Handle the bill "restored" event.
     *
     * @param  \App\Models\Bill  $bill
     * @return void
     */
    public function restored(Bill $bill)
    {
        //
    }

    /**
     * Handle the bill "force deleted" event.
     *
     * @param  \App\Models\Bill  $bill
     * @return void
     */
    public function forceDeleted(Bill $bill)
    {
        //
    }
}
