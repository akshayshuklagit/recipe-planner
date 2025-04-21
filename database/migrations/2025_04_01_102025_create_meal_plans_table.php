<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealPlansTable extends Migration
{
    public function up(): void
    {
        Schema::create('meal_plans', function (Blueprint $table) {
            $table->id();
            
            // Foreign key with proper constraints
            $table->foreignId('user_id')
                  ->constrained('users') // Explicit table name
                  ->onDelete('cascade')  // Delete meal plans when user is deleted
                  ->onUpdate('cascade');
            
            // Date fields with index
            $table->date('start_date')->index();
            $table->date('end_date')->index();
            
            // Additional useful fields
            $table->string('name')->nullable()->comment('Optional plan name');
            $table->text('notes')->nullable()->comment('User notes about the plan');
            
            // Timestamps
            $table->timestamps();
        });

        // Add composite index
        Schema::table('meal_plans', function (Blueprint $table) {
            $table->index(['user_id', 'start_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meal_plans');
    }
}