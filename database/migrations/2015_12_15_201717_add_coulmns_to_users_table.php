<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoulmnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table){
            $table->string('city')->after('password')->nullable();
            $table->string('country')->after('city')->nullable();
            $table->date('birth')->after('country')->nullable();
            $table->string('type')->after('birth')->nullable();
            $table->string('dealership_title')->after('type')->nullable();
            $table->text('dealership_description')->after('dealership_title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table){
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('birth');
            $table->dropColumn('type');
            $table->dropColumn('dealership_title');
            $table->dropColumn('dealership_description');
        });
    }
}