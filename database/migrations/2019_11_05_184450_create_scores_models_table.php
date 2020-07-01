<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('uid')->unsigned();
            $table->foreign('uid')->references('id')->on('users');
            $table->integer('score_positive');
            $table->integer('ml_score_positive');
            $table->integer('dsa_score_positive');
            $table->integer('java_score_positive');

            $table->integer('correct_java_basic');
            $table->integer('correct_java_medium');
            $table->integer('correct_java_high');
            $table->integer('correct_ml_basic');
            $table->integer('correct_ml_medium');
            $table->integer('correct_ml_high');
            $table->integer('correct_dsa_basic');
            $table->integer('correct_dsa_medium');
            $table->integer('correct_dsa_high');

            $table->float('average_score')->nullable();
            $table->integer('java_eq');
            $table->integer('dsa_eq');
            $table->integer('ml_eq');
            $table->string('recommended_course')->nullable();
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
        Schema::dropIfExists('scores_models');
    }
}
