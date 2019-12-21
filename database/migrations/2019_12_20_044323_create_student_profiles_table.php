<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->text('lane1')->nullable();
            $table->text('lane2')->nullable();
            $table->text('lane3')->nullable();
            $table->text('city')->nullable();
            $table->text('state')->nullable();
            $table->double('zipcode')->nullable();
            $table->text('cast')->nullable();
            $table->text('degree')->nullable();
            $table->integer('marks')->nullable();
            $table->string('department')->nullable();
            $table->integer('sem')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('student_profiles');
    }
}
