<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Customer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 100)->nullable(false);
            $table->string('last_name', 100)->nullable(false);
            $table->string('SSN', 45)->nullable(false);
            $table->unsignedInteger('age')->nullable(false);
            $table->date('date_of_birth')->nullable(false);
            $table->string('occupation', 100)->nullable(false);
            $table->string('current_address', 100)->nullable(false);
            $table->integer('telephone')->unsigned()->nullable(false);
            $table->string('email', 100)->nullable(false);
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
        Schema::dropIfExists('customers');
    }
}
