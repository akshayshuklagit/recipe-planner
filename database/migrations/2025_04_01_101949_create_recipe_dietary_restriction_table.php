<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipe_dietary_restriction', function (Blueprint $table) {
            $table->foreignId('recipe_id')->constrained();
            $table->foreignId('dietary_restriction_id')->constrained();
            $table->primary(['recipe_id', 'dietary_restriction_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_dietary_restriction');
    }
};
