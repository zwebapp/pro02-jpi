<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('lookup_user_type')->unsigned();
            $table->string('full_name');
            $table->string('company_name')->nullable();
            $table->string('password', 64);
            $table->string('email');
            $table->string('address')->nullable();
            $table->string('company_address')->nullable();
            $table->string('contact_no');
            $table->string('birthday')->nullable();
            $table->integer('lookup_security_question')->unsigned();
            $table->string('security_question_answer');
            $table->boolean('is_validated')->default(0);
            $table->boolean('is_active')->default(1);

            $table->timestamps();

            $table->foreign('lookup_user_type')->references('id')->on('lookups')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('lookup_security_question')->references('id')->on('lookups')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clients');
    }

}
