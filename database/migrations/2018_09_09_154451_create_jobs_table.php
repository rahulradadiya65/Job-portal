<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('jobs_id');
            $table->integer('user_id')->unsigned();
            $table->integer('categories_id')->unsigned();
            $table->integer('jobs_types_id')->unsigned();
            $table->string('jobs_title');
            $table->text('description');
            $table->integer('states_id')->unsigned();
            $table->integer('cities_id')->unsigned();$table->string('minimum_salary');
            $table->string('maximum_salary');
            $table->integer('salary_types_id')->unsigned();$table->string('minimum_experience');$table->string('maximum_experience');
            $table->string('skills');   
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('categories_id')->references('categories_id')->on('categories');
            $table->foreign('jobs_types_id')->references('jobs_types_id')->on('jobs_types');
            $table->foreign('states_id')->references('states_id')->on('states');
            $table->foreign('cities_id')->references('cities_id')->on('cities');
            $table->foreign('salary_types_id')->references('salary_types_id')->on('salary_types');
                 });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
