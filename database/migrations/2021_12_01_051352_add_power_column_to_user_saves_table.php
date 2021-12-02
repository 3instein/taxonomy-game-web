<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPowerColumnToUserSavesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('user_saves', function (Blueprint $table) {
            $table->unsignedBigInteger('power')->default(1)->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('user_saves', function (Blueprint $table) {
            $table->dropColumn('power');
        });
    }
}