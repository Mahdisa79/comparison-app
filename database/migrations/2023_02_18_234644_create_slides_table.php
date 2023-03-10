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
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slider_id')->index();
            $table->foreign('slider_id')->references('id')->on('sliders')->cascadeOnDelete()->cascadeOnUpdate();;
            $table->text('image');
            $table->string('title',255);
            $table->text('url')->nullable();
            $table->enum('status', [0,1])->default(1)->comment('0=>disable  1=>active');

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
        Schema::dropIfExists('slides');
    }
};
