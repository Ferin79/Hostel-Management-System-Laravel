<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCopySeatMatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copy_seat_matrices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('institution_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->integer('year')->nullable();
            $table->text('cast')->nullable();
            $table->integer('boys_seat')->nullable();
            $table->integer('girls_seat')->nullable();
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
        Schema::dropIfExists('copy_seat_matrices');
    }
}
