<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * 系统参数表
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
        Schema::create('system_sets', function (Blueprint $table) {
            $table->id();
            $table->string('key',100)->comment('键');
            $table->text('value')->nullable()->comment('值');
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
        Schema::dropIfExists('system_sets');
    }
}
