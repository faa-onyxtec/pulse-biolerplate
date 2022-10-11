<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnonymousCoulumnToFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->string('anonymous')->after('user_id')->nullable();
            $table->foreignId('from_user_id')->after('user_id')->constrained()->references('id')->on('users')->onDelete('cascade')->nullable();
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
            $table->dropColumn('anonymous')->after('user_id');
            $table->dropForeign('feedback_from_user_id_foreign');
            $table->dropColumn('from_user_id');
        });
    }
}
