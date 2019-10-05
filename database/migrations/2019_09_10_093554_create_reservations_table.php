<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id')->nullable(false);
            $table->unsignedInteger('room_id')->nullable(false);
            $table->unsignedInteger('payment_id')->nullable(false);
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('status', 100);
            $table->unsignedInteger('No_of_rooms')->nullable(false);
            $table->foreign('customer_id')->references('id')->on('customers')
            ->onUpdate('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')
            ->onUpdate('cascade');
            $table->foreign('payment_id')->references('id')->on('payments')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('reservations');
    }
}
