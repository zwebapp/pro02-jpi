<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateClientsAndAdministratorsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function(Blueprint $table){
            $table->dropColumn('password');
        });

        Schema::table('administrators', function(Blueprint $table){
            $table->dropColumn('username');
            $table->dropColumn('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function(Blueprint $table){
            $table->string('password', 64);
        });

        Schema::table('administrators', function(Blueprint $table){
            $table->string('password', 64);
        });
    }

}
