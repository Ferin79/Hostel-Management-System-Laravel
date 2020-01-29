<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeritListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merit_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('institution_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
//            $table->unsignedBigInteger('student_applies_id');
                       $table->boolean('in_ssc_hsc')->nullable();
                       $table->boolean('in_college')->nullable();
                        $table->double('cgpa')->nullable();
                        $table->double('percentage')->nullable();
                        $table->double('term')->nullable();
                        $table->string('cast')->nullable();
                        $table->string('gender')->nullable();
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
        Schema::dropIfExists('merit_lists');
    }
}
