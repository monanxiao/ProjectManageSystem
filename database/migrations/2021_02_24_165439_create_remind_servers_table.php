<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemindServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * 作者： 墨楠
     * 邮箱： monanxiao@qq.com
     * 联系QQ: 3528419209
     * 时间：2021/02/25
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remind_servers', function (Blueprint $table) {
            $table->id();
            $table->string('serverName','35')->comment('服务名称');
            $table->jsonb('serverPeriod')->comment('开始/结束时间');
            $table->decimal('serverPrice')->default(0.00)->comment('服务金额');
            $table->integer('serverStatus')->default(1)->comment('服务状态 0:运行中 1：暂停 2：欠费 3：终止');
            $table->jsonb('remind')->nullable()->comment('提醒方式：短信、邮件、公众号');
             $table->integer('smsTime')->default(0)->comment('短信通知次数');
            $table->integer('emailTime')->default(0)->comment('邮箱通知次数');
            $table->integer('wechatTime')->default(0)->comment('微信通知次数');
            $table->foreignId('project_id')->nullable()->comment('所属项目ID')->constrained();
            $table->foreignId('customer_id')->nullable()->comment('所属客户ID')->constrained();
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
        Schema::dropIfExists('remind_servers');
    }
}
