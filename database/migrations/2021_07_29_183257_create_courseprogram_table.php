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

            $table->string('subjCode');
            $table->foreign('subjCode')
                ->references('subjCode')
                ->on('Course')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->string('progCode');
            $table->foreign('progCode')
                ->references('progCode')
                ->on('Programme')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->boolean('isProfessional')->nullable()->default(1);
            $table->tinyInteger('semester')->nullable()->default(1);
            $table->tinyInteger('yearLevel')->nullable();
            $table->smallInteger('yearImplemented');
        });
        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCS',
                   'subjCode'   =>   'CS 123',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCS',
                   'subjCode'   =>   'CS 246',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCS',
                   'subjCode'   =>   'ELC 111',
                   'isProfessional'   =>   '0',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCS',
                   'subjCode'   =>   'GE 222',
                   'isProfessional'   =>   '0',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCS',
                   'subjCode'   =>   'ET 111',
                   'isProfessional'   =>   '0',
                   'semester'   =>   '2',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCS',
                   'subjCode'   =>   'CS 2222',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '2',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCS',
                   'subjCode'   =>   'ELC 222',
                   'isProfessional'   =>   '0',
                   'semester'   =>   '2',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCS',
                   'subjCode'   =>   'CS 456',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '2',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSPSYCH',
                   'subjCode'   =>   'PSY 246',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSPSYCH',
                   'subjCode'   =>   'ELC 111',
                   'isProfessional'   =>   '0',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSPSYCH',
                   'subjCode'   =>   'ET 111',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSPSYCH',
                   'subjCode'   =>   'GE 222',
                   'isProfessional'   =>   '0',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSPSYCH',
                   'subjCode'   =>   'PSY 333',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '2',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSPSYCH',
                   'subjCode'   =>   'ELC 222',
                   'isProfessional'   =>   '0',
                   'semester'   =>   '2',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'ABPHILO',
                   'subjCode'   =>   'PH 123',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'ABPHILO',
                   'subjCode'   =>   'ELC 111',
                   'isProfessional'   =>   '0',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'ABPHILO',
                   'subjCode'   =>   'GE 222',
                   'isProfessional'   =>   '0',
                   'semester'   =>   '2',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'ABPHILO',
                   'subjCode'   =>   'ET 111',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '2',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'ABPHILO',
                   'subjCode'   =>   'ELC 222',
                   'isProfessional'   =>   '0',
                   'semester'   =>   '2',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );
	DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCHE',
                   'subjCode'   =>   'CHE 22222',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCHE',
                   'subjCode'   =>   'GE 222',
                   'isProfessional'   =>   '0',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCHE',
                   'subjCode'   =>   'TRIG 11111',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '2',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCHE',
                   'subjCode'   =>   'CHE 22333',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '2',
                   'yearLevel'   =>   '1',
                   'yearImplemented'   =>   '2018',
            )
        );
	DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCHE',
                   'subjCode'   =>   'CHE 22111',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '2',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCHE',
                   'subjCode'   =>   'DIFF 22222',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '2',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCHE',
                   'subjCode'   =>   'APP 11111',
                   'isProfessional'   =>   '0',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '2',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCHE',
                   'subjCode'   =>   'CHE 22444',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '2',
                   'yearImplemented'   =>   '2018',
            )
        );

        DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCHE',
                   'subjCode'   =>   'CHE 22223',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '2',
                   'yearLevel'   =>   '2',
                   'yearImplemented'   =>   '2018',
            )
        );

	    DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCHE',
                   'subjCode'   =>   'CHE 22224',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '3',
                   'yearImplemented'   =>   '2018',
            )
        );

	    DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCHE',
                   'subjCode'   =>   'CHE 22225',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '2',
                   'yearLevel'   =>   '3',
                   'yearImplemented'   =>   '2018',
            )
        );

	    DB::table('CourseProgramme')->insert(
            array(
                   'progCode'   =>   'BSCHE',
                   'subjCode'   =>   'CHE 22226',
                   'isProfessional'   =>   '1',
                   'semester'   =>   '1',
                   'yearLevel'   =>   '4',
                   'yearImplemented'   =>   '2018',
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
