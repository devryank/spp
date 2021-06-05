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
        Schema::create('students', function (Blueprint $table) {
            $table->string('npm')->primary();
            $table->unsignedBigInteger('program_faculty_id');
            $table->string('name');
            $table->date('birth');
            $table->integer('semester');
            $table->timestamps();
        });

        Schema::table('students', function (Blueprint $table) {
            $table->foreign('program_faculty_id')->references('id')->on('program_faculties');
        });
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
