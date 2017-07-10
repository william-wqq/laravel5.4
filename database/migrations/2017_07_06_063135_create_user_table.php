<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->engine = 'InnoDB';//引擎
            $table->charset = 'utf8';//字符集
            $table->collation = 'utf8_general_ci';//排序规则
            $table->increments('id')->comment('用户ID');
            $table->string('username', 50)->comment('用户名');
            $table->string('email', 50)->unique()->comment('邮箱');
            $table->tinyInteger('age')->unsigned()->comment('年龄');//nullable()默认为空
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
