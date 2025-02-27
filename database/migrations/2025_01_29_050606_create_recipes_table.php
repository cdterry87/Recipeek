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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title', 60);
            $table->string('description', 80)->nullable();
            $table->string('category', 16)->nullable();
            $table->string('difficulty', 16)->nullable();
            $table->tinyInteger('hours')->nullable();
            $table->tinyInteger('minutes')->nullable();
            $table->tinyInteger('servings')->nullable();
            $table->integer('calories')->nullable();
            $table->text('image')->nullable();
            $table->text('video')->nullable();
            $table->boolean('private');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
