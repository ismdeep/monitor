<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusTagTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('status_tag', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('status_id')->nullable(false)->comment('状态ID');
            $table->bigInteger('tag_id')->nullable(false)->comment('标签ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('status_tag');
    }
}
