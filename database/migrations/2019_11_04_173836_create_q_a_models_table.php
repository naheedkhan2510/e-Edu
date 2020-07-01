<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQAModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qa_db', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject');
            $table->string('question');
            $table->string('correct_option');
            $table->string('other_option1');
            $table->string('other_option2');
            $table->string('other_option3');
            $table->string('answer_explanation')->nullable();
            $table->string('answer_diagram')->nullable();
            $table->string('subject_solve_rate')->default(0);
            $table->string('level');
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
        Schema::dropIfExists('q_a_models');
    }
}
