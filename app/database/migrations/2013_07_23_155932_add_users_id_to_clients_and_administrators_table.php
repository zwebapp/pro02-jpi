<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddUsersIdToClientsAndAdministratorsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function(Blueprint $table) {
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('administrators', function(Blueprint $table) {
           $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function(Blueprint $table) {
            $table->dropForeign('clients_user_id_foreign');
            $table->dropColumn('user_id');
        });

        Schema::table('administrators', function(Blueprint $table) {
            $table->dropForeign('administrators_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }

}
