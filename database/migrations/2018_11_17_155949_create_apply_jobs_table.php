<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplyjobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_jobs', function (Blueprint $table) {
            $table->increments('apply_jobs_id');
            $table->integer('jobs_id')->unsigned();
            $table->integer('apply_users_id')->unsigned();
            $table->timestamps();
            $table->foreign('jobs_id')->references('jobs_id')->on('jobs');
            $table->foreign('apply_users_id')->references('id')->on('users');
               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applyjobs');
    }
}
