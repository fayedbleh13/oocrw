<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsHouserulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings__houserules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('listings_id')->unsigned()->nullable();
            $table->foreign('listings_id')->references('id')->on('listings')->onDelete('cascade');
            $table->bigInteger('building_id')->unsigned()->nullable();
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');
            $table->text('house_rules');
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
        Schema::dropIfExists('listings__houserules');
    }
}
