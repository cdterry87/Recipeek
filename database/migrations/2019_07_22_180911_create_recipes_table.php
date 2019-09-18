<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->tinyInteger('prep_hours')->nullable();
            $table->tinyInteger('prep_minutes')->nullable();
            $table->tinyInteger('total_hours')->nullable();
            $table->tinyInteger('total_minutes')->nullable();
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
