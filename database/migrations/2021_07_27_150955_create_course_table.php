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
            
            $table->timestamps();

            $table->string('subjCode')->primary();
            $table->string('subjName');
            $table->smallInteger('units')->nullable()->default(3);

        });

        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'CS 123',
                   'subjName'   =>   'Intro to Computing',
                   'units'   =>   '5',
            )
        );

        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'CS 246',
                   'subjName'   =>   'Computer Programming',
                   'units'   =>   '5',
            )
        );

        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'PH 123',
                   'subjName'   =>   'Intro to Philosophy',
                   'units'   =>   '3',
            )
        );

        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'PSY 246',
                   'subjName'   =>   'Intro to Psychology',
                   'units'   =>   '3',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'ELC 111',
                   'subjName'   =>   'Elective 1',
                   'units'   =>   '2',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'GE 222',
                   'subjName'   =>   'Life and Works of Rizal',
                   'units'   =>   '3',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'PSY 333',
                   'subjName'   =>   'Anthropology',
                   'units'   =>   '3',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'ET 111',
                   'subjName'   =>   'Ethics',
                   'units'   =>   '3',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'CS 2222',
                   'subjName'   =>   'Computer Programming',
                   'units'   =>   '5',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'ELC 222',
                   'subjName'   =>   'Elective 2',
                   'units'   =>   '2',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'CS 456',
                   'subjName'   =>   'Object Oriented Programming',
                   'units'   =>   '5',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'CHE 22111',
                   'subjName'   =>   'Chemistry for Engineers',
                   'units'   =>   '5',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'DIFF 22222',
                   'subjName'   =>   'Differential Equations',
                   'units'   =>   '3',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'APP 11111',
                   'subjName'   =>   'Art Appreciation',
                   'units'   =>   '2',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'CHE 22444',
                   'subjName'   =>   'Engineering Management',
                   'units'   =>   '3',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'CHE 22333',
                   'subjName'   =>   'Engineering Data Analysis',
                   'units'   =>   '3',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'TRIG 11111',
                   'subjName'   =>   'College Trigonometry',
                   'units'   =>   '3',
            )
        );
        DB::table('Course')->insert(
            array(
                   'subjCode'   =>   'CHE 22222',
                   'subjName'   =>   'Engineering Economics',
                   'units'   =>   '3',
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
