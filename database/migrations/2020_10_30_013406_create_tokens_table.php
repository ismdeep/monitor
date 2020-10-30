<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable(false)->comment('用户ID');
            $table->string('name')->nullable(false)->comment('名称');
            $table->string('token')->nullable(false)->comment('Token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tokens');
    }
}
