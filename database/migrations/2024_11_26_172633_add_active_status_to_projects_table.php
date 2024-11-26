<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActiveStatusToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('is_ongoing_str')->after('is_ongoing')->nullable();
            $table->enum('active_status',['Active','InActive'])->after('is_ongoing_str')->nullable()->comment('Active/InActive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void projects
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('is_ongoing_str');
            $table->dropColumn('active_status');
        });
    }
}
