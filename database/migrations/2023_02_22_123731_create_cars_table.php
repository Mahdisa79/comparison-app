<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->text('image');
            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();

            $table->unsignedBigInteger('brand_id')->index();
            $table->foreign('brand_id')->references('id')->on('brands')->cascadeOnUpdate()->cascadeOnDelete();
         
            $table->enum('status', [0,1])->default(1)->comment('0=>disable  1=>active');

            $table->string("color")->nullable();
            $table->string("power")->nullable();
            $table->string("price_us")->nullable();
            $table->string("country")->nullable();
    //         $table->foreign('country_id')->references('id')->on('countries')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("maxspeed")->nullable();
            $table->string("safety_class")->nullable();

            $table->string("fuel_consumption")->nullable(); //

            $table->string("acceleration")->nullable(); //shetab



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
        Schema::dropIfExists('cars');
    }
};
