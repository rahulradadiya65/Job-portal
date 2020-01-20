<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('companies_id');
            $table->integer('user_id')->unsigned();
            $table->string('companies_name');
            $table->string('public_url')->unique();
            $table->string('website')->unique();
            $table->text('companies_tagline');
            $table->text('description');
            $table->integer('industries_id')->unsigned();
            $table->integer('companies_sizes_id')->unsigned();
            $table->integer('Companies_types_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('industries_id')->references('industries_id')->on('industries');
            $table->foreign('companies_sizes_id')->references('companies_sizes_id')->on('companies_sizes');
            $table->foreign('companies_types_id')->references('Companies_types_id')->on('Companies_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
