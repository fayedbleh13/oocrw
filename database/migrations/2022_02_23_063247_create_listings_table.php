<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_description')->nullable();
            $table->text('description');
            $table->double('price');
            $table->decimal('promo_price')->nullable();
            $table->boolean('featured')->default(false);
            $table->string('image')->nullable();
            $table->text('image_gallery')->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->bigInteger('building_id')->unsigned()->nullable();
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');
            $table->bigInteger('amenities_id')->unsigned()->nullable();
            $table->foreign('amenities_id')->references('id')->on('amenities')->onDelete('cascade');
            $table->bigInteger('houserules_id')->unsigned()->nullable();
            $table->foreign('houserules_id')->references('id')->on('houserules')->onDelete('cascade');
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
        Schema::dropIfExists('listings');
    }
}
