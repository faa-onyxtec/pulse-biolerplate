<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('applicant_id')->unsigned();
            $table->foreign('applicant_id')->references('id')->on('personal_infos')->onDelete('cascade');
            $table->string('employer_name');
            $table->string('from');
            $table->string('to');
            $table->string('position');
            $table->integer('salary');
            $table->string('reason');
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
        Schema::dropIfExists('employment_histories');
    }
}