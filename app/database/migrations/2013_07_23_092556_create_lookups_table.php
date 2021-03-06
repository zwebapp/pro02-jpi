<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLookupsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lookups', function(Blueprint $table) {
            $table->increments('id');
            $table->string('value');
            $table->integer('lookup_type_id')->unsigned();

            $table->foreign('lookup_type_id')->references('id')->on('lookup_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lookups');
    }

}
