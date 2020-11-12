<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedInStatusTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('status', function (Blueprint $table) {
            $table->tinyInteger('deleted')
                ->default(0)
                ->after('description')
                ->comment('删除标记，0未删除，1已删除');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('status', function (Blueprint $table) {
            $table->dropColumn('deleted');
        });
    }
}
