<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('students'))
        {
            Schema::create('students', function (Blueprint $table) {
                $table->id();
                $table->string('student_name');
                $table->string('email');
                $table->bigInteger('teacher_id');
                $table->timestamps();
                $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
