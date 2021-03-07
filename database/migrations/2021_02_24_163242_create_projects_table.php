<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('projectName',35)->comment('项目名称');
            $table->decimal('estimatedPrice',8,2)->default(0.00)->comment('预估金额');
            $table->decimal('realPrice',8,2)->default(0.00)->comment('实际金额');
            $table->decimal('prepayPrice',8,2)->default(0.00)->comment('预付金额');
            $table->integer('implementStatus')->default(4)->comment('项目状态 0：已完成 1:进行中 2：终止 3：暂停 4:未开始');
            $table->jsonb('projectPeriod')->comment('开始/截至时间');
            $table->timestamp('actuaTime',0)->nullable()->comment('实际完成时间');
            $table->jsonb('attachedFiles')->nullable()->comment('附件材料');
            $table->string('versions')->default('1.0')->comment('项目版本');
            $table->foreignId('customer_id')->comment('所属客户ID')->constrained();
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
        Schema::dropIfExists('projects');
    }
}
