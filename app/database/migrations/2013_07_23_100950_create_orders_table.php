<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('lookup_status')->unsigned();
            $table->text('products');
            $table->string('delivery_address');
            $table->integer('agent_id')->unsigned()->nullable();
            $table->integer('approved_by')->unsigned()->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('CASCADE')->onUpdate('CASCADE');;
            $table->foreign('lookup_status')->references('id')->on('lookups')->onDelete('CASCADE')->onUpdate('CASCADE');;
            $table->foreign('approved_by')->references('id')->on('administrators')->onDelete('CASCADE')->onUpdate('CASCADE');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }

}
