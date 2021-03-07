<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * 财务账单记录表
     *
     * 作者： 墨楠
     * 邮箱： monanxiao@qq.com
     * 联系QQ: 3528419209
     * 时间：2021/03/01
     *
     * @return void
    */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('BillNumber',18)->unique()->comment('账单订单号');
            $table->string('BillName')->comment('项目/服务 名称');
            $table->foreignId('customer_id')->comment('付款客户ID')->constrained();
            $table->string('EarningMode','15')->default('未记录')->comment('收款方式');
            $table->timestamp('earningTime')->nullable()->comment('收款日期');
            $table->decimal('earningPrice',8,2)->comment('收款金额');
            $table->integer('earningStatus')->default(1)->comment('收款状态 0待付款 1已付款 2失败 3退回');
            $table->string('earningAnnotation')->nullable()->comment('收款注释');
            $table->integer('attache_id')->nullable()->comment('收款附件记录');
            $table->jsonb('projectServerId')->comment('所属项目/服务 id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
