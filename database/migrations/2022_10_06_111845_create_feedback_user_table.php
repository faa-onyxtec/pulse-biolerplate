<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feedback_id')->constrained()->references('id')->on('feedback')->onDelete('cascade')->nullable();
            $table->foreignId('user_id')->constrained()->references('id')->on('users')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('feedback_user');
    }
}
