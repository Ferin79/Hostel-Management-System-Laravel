<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatMatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seat_matrices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('institute_id');
            $table->unsignedBigInteger('department_id');
            $table->integer('year');
            $table->text('cast');
            $table->integer('boys_seat');
            $table->integer('girls_seat');
            $table->timestamps();

            $table->index('institute_id');
            $table->index('department_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seat_matrices');
    }
}
