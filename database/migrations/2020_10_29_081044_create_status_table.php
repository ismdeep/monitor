<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable(false)->comment('用户ID');
            $table->tinyInteger('type')->nullable(false)->comment('类型');
            $table->string('key_name')->nullable(false)->comment('名称');
            $table->string('value')->nullable(false)->comment('值');
            $table->string('description')->nullable(false)->default('')->comment('描述');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('status');
    }
}
