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
            $table->bigIncrements('id');
            $table->smallInteger('customer_id')->nullable(false);
            $table->smallInteger('room_id')->nullable(false);
            $table->date('reservation_date')->nullable(false)->default(new DateTime());
            $table->date('expiry_date')->nullable(false)->default(new DateTime());
            $table->boolean('status')->nullable(false)->default(false);
            $table->smallInteger('No_of_rooms')->nullable()->default(12);
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('room_id')->references('id')->on('rooms');
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
