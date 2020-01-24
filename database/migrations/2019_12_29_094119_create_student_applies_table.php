<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_applies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unique();
//            $table->string('guard_name')->nullable();
//            $table->string('guard_email')->nullable();
//            $table->string('guard_number')->nullable();
            $table->integer('term')->nullable();
            $table->string('room_type')->nullable();
            $table->boolean('ac')->default('0');
            $table->boolean('food')->default('1');
            $table->integer('duration')->default('6');
            $table->integer('total')->nullable();
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
        Schema::dropIfExists('student_applies');
    }
}
