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
            $table->increments('id');
            $table->string('box_type', 100);
            $table->string('title');
            $table->string('slug');
            $table->string('short_title', 100);
            $table->text('marketing_description');
            $table->integer('calories_kcal')->unsigned();
            $table->integer('protein_grams')->unsigned();
            $table->integer('fat_grams')->unsigned();
            $table->integer('carbs_grams')->unsigned();
            $table->string('bulletpoint1')->nullable();
            $table->string('bulletpoint2')->nullable();
            $table->string('bulletpoint3')->nullable();
            $table->string('recipe_diet_type_id');
            $table->string('season', 100);
            $table->string('base', 100)->nullable();
            $table->string('protein_source', 100);
            $table->integer('preparation_time_minutes')->unsigned();
            $table->integer('shelf_life_days')->unsigned();
            $table->string('equipment_needed');
            $table->string('origin_country');
            $table->string('recipe_cuisine', 50);
            $table->text('in_your_box')->nullable();
            $table->integer('gousto_reference')->unsigned();
            $table->timestamps();

            $table->index('recipe_cuisine');
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
