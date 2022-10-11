<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAboutUserIdColumnToFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->foreignId('about_user_id')->after('user_id')->constrained()->references('id')->on('users')->onDelete('cascade')->nullable();
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->dropForeign('feedback_about_user_id_foreign');
            $table->dropColumn('about_user_id');
        });
    }
}
