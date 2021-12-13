<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCreaturesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('user_creatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('species_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->integer('amount')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('user_creatures');
    }
}
