<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPublishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_publishes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('departmentId')->unsigned();
            $table->foreign('departmentId')->references('id')->on('departments')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('publishDate');
            $table->integer('noOfVacancies');
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
        Schema::dropIfExists('job_publishes');
    }
}