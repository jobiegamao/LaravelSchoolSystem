<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollprogrammeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EnrollProgramme', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //select if major/degree or minor or certificate
            $table->string('description');
            
            $table->smallInteger('status')->default(0);

            $table->foreignID('student_id')
                ->contstrained('Student')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('progCode');

            $table->foreign('progCode')
                ->references('progCode')
                ->on('Programme');
        });

        DB::table('EnrollProgramme')->insert(
            array(
		            'student_id' =>   '20001',
                   'progCode'   =>   'BSCS',
                   'description'   =>   'Major',
            )
        );

        DB::table('EnrollProgramme')->insert(
            array(
		  'student_id' =>   '20001',
                   'progCode'   =>   'ABPHILO',
                   'description'   =>   'Certificate',
                   

            )
        );

	DB::table('EnrollProgramme')->insert(
            array(
		  'student_id' =>   '20002',
                   'progCode'   =>   'BSPSYCH',
                   'description'   =>   'Major',
            )
        );

        DB::table('EnrollProgramme')->insert(
            array(
		  'student_id' =>   '20002',
                   'progCode'   =>   'BSCS',
                   'description'   =>   'Minor',
            )
        );
	
	DB::table('EnrollProgramme')->insert(
            array(
		  'student_id' =>   '20003',
                   'progCode'   =>   'ABPHILO',
                   'description'   =>   'Major',
            )
        );

        DB::table('EnrollProgramme')->insert(
            array(
		  'student_id' =>   '20004',
                   'progCode'   =>   'BSCHE',
                   'description'   =>   'Major',
            )
        );

        DB::table('EnrollProgramme')->insert(
            array(
		           'student_id' =>   '20005',
                   'progCode'   =>   'BSCHE',
                   'description'   =>   'Major',
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
        Schema::dropIfExists('EnrollProgramme');
    }
}
