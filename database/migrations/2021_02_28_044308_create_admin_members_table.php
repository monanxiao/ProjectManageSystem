<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * 后台管理用户
     *
     * 作者： 墨楠
     * 邮箱： monanxiao@qq.com
     * 联系QQ: 3528419209
     * 时间：2021/02/28
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_members', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique()->comment('管理账号');
            $table->string('password')->comment('管理密码');
            $table->string('realname')->nullable()->comment('管理姓名');
            $table->string('email')->nullable()->comment('管理邮箱');
            $table->string('mobile',11)->nullable()->comment('管理手机号');
            $table->rememberToken()->comment('用户token');
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
        Schema::dropIfExists('admin_members');
    }
}
