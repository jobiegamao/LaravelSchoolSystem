<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_courses', function (Blueprint $table) {
            $table->id();
            $table->foreign('student_id')->unsigned();
            $table->bigInteger('course_id')->unsigned();
            $table->integer('acad_year');
            $table->string('acad_sem');
            

            $table->timestamps();

            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');

            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade');


        });

        //sample data

        // DB::table('student_courses')->insert(
        //     array(
        //         'student_id' => '1',
        //         'course_id' =>'1',
        //         'acad_year' => '2020',
        //         'acad_sem' => '1st'
        //     )
        // );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_courses');
    }
}
