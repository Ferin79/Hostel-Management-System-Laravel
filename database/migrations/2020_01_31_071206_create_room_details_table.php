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

            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('room_type')->nullable();
            // $table->string('room_select')->nullable();
            $table->integer('price')->nullable();
            $table->text('image1')->nullable();
            $table->text('image2')->nullable();

            $table->text('room_number')->nullable();
            $table->unsignedBigInteger('institution_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->integer('term')->nullable();
            $table->integer('capacity')->nullable();
            $table->integer('assigned')->default(0)->nullable();
            $table->boolean('is_ac')->nullable();
            $table->boolean('is_guest')->nullable();
            $table->boolean('is_alloted')->default(false)->nullable();
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
        Schema::dropIfExists('room_details');
    }
}
