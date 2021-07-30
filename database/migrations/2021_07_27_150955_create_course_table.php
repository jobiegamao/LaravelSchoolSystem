<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Course', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('subjCode');
            $table->string('subjName');

        });
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'CS 123',
                   'subjName'   =>   'Intro to Computing',
            )
        );

        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'CS 246',
                   'subjName'   =>   'Computer Programming 1',
            )
        );

        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'PH 123',
                   'subjName'   =>   'Intro to Philo',
            )
        );

        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'PSY 246',
                   'subjName'   =>   'Intro to Psych',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'ELC 111',
                   'subjName'   =>   'Elective 1',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'GE 222',
                   'subjName'   =>   'Life and Works of Rizal',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'PSY 333',
                   'subjName'   =>   'Anthropology',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'ET 1111',
                   'subjName'   =>   'Ethics',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'CS 22222',
                   'subjName'   =>   'Computer Programming 2',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'ELC 22222',
                   'subjName'   =>   'Elective 2',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'CS 345',
                   'subjName'   =>   'Object Oriented Programming',
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
        Schema::dropIfExists('Course');
    }
}
