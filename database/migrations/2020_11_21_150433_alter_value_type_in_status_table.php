<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterValueTypeInStatusTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('status', function (Blueprint $table) {
            $table->text('value')->comment('Value')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('status', function (Blueprint $table) {
            $table->string('value', 255)->comment('Value')->change();
        });
    }
}
