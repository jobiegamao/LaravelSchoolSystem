<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course_name');
            $table->string('course_code')->unique;
            $table->longText('description')->nullable();
            $table->tinyInteger('status')->default(1);
            //$table->softDeletes();
            $table->timestamps();
        });

        //sample data ERASE LATER
        DB::table('courses')->insert(
            array(
                'course_name' => 'Computer Science',
                'course_code' =>'CS',
                'description' => 'This is a CS course so techy',
            )
        );

        DB::table('courses')->insert(
            array(
                'course_name' => 'Info Tech',
                'course_code' =>'IT',
                'description' => 'This is an IT course so techy',
            )
        );

        DB::table('courses')->insert(
            array(
                'course_name' => 'Info Science',
                'course_code' =>'IS',
                'description' => 'This is an IS course so techy',
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
