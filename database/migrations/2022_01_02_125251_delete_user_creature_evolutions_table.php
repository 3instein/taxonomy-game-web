<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteUserCreatureEvolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('user_creatures_evolutions');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_creatures_evolutions', function (Blueprint $table) {
            $table->foreignId('user_creature_id')
                ->references('id')
                ->on('user_creatures')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('creature_evolution_id')
                ->references('id')
                ->on('creatures_evolutions')
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }
}
