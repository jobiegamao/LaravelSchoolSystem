<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseprogramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CourseProgramme', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignID('course_id')
                ->contstrained('Course')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignID('programme_id')
                ->contstrained('Programme')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->boolean('isProfessional')->nullable()->default(1);
        });

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '1',
                   'programme_id'   =>   '1',
                  
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '2',
                   'programme_id'   =>   '1',
                 
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '5',
                   'programme_id'   =>   '1',
                   'isProfessional'   =>   '0',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '6',
                   'programme_id'   =>   '1',
                   'isProfessional'   =>   '0',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '8',
                   'programme_id'   =>   '1',
                   'isProfessional'   =>   '0',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '9',
                   'programme_id'   =>   '1',
                  
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '10',
                   'programme_id'   =>   '1',
                   'isProfessional'   =>   '0',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '11',
                   'programme_id'   =>   '1',
                  
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '4',
                   'programme_id'   =>   '2',
                
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '5',
                   'programme_id'   =>   '2',
                   'isProfessional'   =>   '0',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '8',
                   'programme_id'   =>   '2',
                  
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '6',
                   'programme_id'   =>   '2',
                   'isProfessional'   =>   '0',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '7',
                   'programme_id'   =>   '2',
                  
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '10',
                   'programme_id'   =>   '2',
                   'isProfessional'   =>   '0',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '3',
                   'programme_id'   =>   '3',
                  
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '5',
                   'programme_id'   =>   '3',
                   'isProfessional'   =>   '0',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '6',
                   'programme_id'   =>   '3',
                   'isProfessional'   =>   '0',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '8',
                   'programme_id'   =>   '3',
                  
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'course_id'   =>   '10',
                   'programme_id'   =>   '3',
                  
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
        Schema::dropIfExists('CourseProgramme');
    }
}
