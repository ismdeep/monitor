<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tag', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable(false)->comment('用户ID');
            $table->string('tag_name')->nullable(false)->comment('标签名称');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tag');
    }
}
