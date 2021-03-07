<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * 附件记录表
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
        Schema::create('attaches', function (Blueprint $table) {
            $table->id();
            $table->string('file_name')->index()->comment('文件名');
            $table->string('file_old_name')->index()->comment('旧文件名');
            $table->string('extension')->index()->comment('文件后缀');
            $table->string('file_size')->index()->comment('文件大小');
            $table->string('folder_path')->index()->comment('储存文件夹');
            $table->longText('url_path')->comment('附件url路径');
            $table->string('store_type')->comment('储存平台:本地local 阿里云aliyunoss 腾讯云tencentcos 七牛云qiniukodo');
            $table->string('description')->nullable()->comment('文件描述或备注');
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
        Schema::dropIfExists('attaches');
    }
}
