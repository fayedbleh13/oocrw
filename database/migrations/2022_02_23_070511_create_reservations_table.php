<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('initial');
            $table->string('email');
            $table->string('mobile_number');
            $table->boolean('gender');
            $table->date('birthdate');
            $table->boolean('civil_status');
            $table->string('citizenship');
            $table->string('occupation');
            $table->date('check_in');
            $table->date('check_out');
            $table->bigInteger('listings_id')->unsigned()->nullable();
            $table->foreign('listings_id')->references('id')->on('listings')->onDelete('cascade');
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
