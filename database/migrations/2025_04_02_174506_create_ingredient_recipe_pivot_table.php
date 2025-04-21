<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/YYYY_MM_DD_HHMMSS_create_ingredient_recipe_pivot_table.php
public function up()
{
    Schema::create('ingredient_recipe', function (Blueprint $table) {
        $table->id();
        $table->foreignId('ingredient_id')->constrained();
        $table->foreignId('recipe_id')->constrained();
        $table->string('quantity')->nullable();
        $table->string('unit')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('ingredient_recipe');
}
};
