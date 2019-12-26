<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('room-no')->nullable();
            $table->string('department')->nullable();
            $table->boolean('ac')->nullable();
            $table->integer('bed-no')->nullable();
            $table->integer('occupied')->nullable();
            $table->integer('price')->nullable();
            $table->text('image1')->nullable();
            $table->text('image2')->nullable();
            $table->text('image3')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_details');
    }
}
