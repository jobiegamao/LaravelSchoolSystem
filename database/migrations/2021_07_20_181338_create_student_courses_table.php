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
            $table->foreignId('student_id')
                ->constrained('students')
                ->onDelete('cascade');

            $table->foreignId('course_id')
                ->constrained('courses')
                ->onDelete('cascade');

            $table->integer('acad_year');
            $table->string('acad_sem');
            

            $table->timestamps();




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
