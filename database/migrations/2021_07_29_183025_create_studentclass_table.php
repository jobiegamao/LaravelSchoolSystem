<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentclassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('StudentClass', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignID('student_id')
                ->contstrained('Student')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignID('classOffering_id')
                ->nullable()
                ->contstrained('ClassOffering')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignID('classGrade_id')
                ->nullable()
                ->contstrained('ClassGrade')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            
        });


        DB::table('StudentClass')->insert(
            array(
                   'student_id'   =>   '20004',
                   'classOffering_id'   =>   '35',
                   'classGrade_id'   =>   '1',
            )
         );

	DB::table('StudentClass')->insert(
            array(
                   'student_id'   =>   '20004',
                   'classOffering_id'   =>   '41',
                   'classGrade_id'   =>   '2',
            )
         );

	DB::table('StudentClass')->insert(
            array(
                   'student_id'   =>   '20004',
                   'classOffering_id'   =>   '37',
                   'classGrade_id'   =>   '3',
            )
         );

	DB::table('StudentClass')->insert(
            array(
                   'student_id'   =>   '20004',
                   'classOffering_id'   =>   '39',
                   'classGrade_id'   =>   '4',
            )
         );

    DB::table('StudentClass')->insert(
            array(
                   'student_id'   =>   '20005',
                   'classOffering_id'   =>   '43',
                   'classGrade_id'   =>   '5',
            )
         );

	DB::table('StudentClass')->insert(
            array(
                   'student_id'   =>   '20005',
                   'classOffering_id'   =>   '44',
                   'classGrade_id'   =>   '6',
            )
         );
	
	DB::table('StudentClass')->insert(
            array(
                   'student_id'   =>   '20005',
                   'classOffering_id'   =>   '45',
                   'classGrade_id'   =>   '7',
            )
         );

	DB::table('StudentClass')->insert(
            array(
                   'student_id'   =>   '20005',
                   'classOffering_id'   =>   '46',
                   'classGrade_id'   =>   '8',
            )
         );
	
	DB::table('StudentClass')->insert(
            array(
                   'student_id'   =>   '20005',
                   'classOffering_id'   =>   '47',
                   'classGrade_id'   =>   '9',
            )
         );

	DB::table('StudentClass')->insert(
            array(
                   'student_id'   =>   '20005',
                   'classOffering_id'   =>   '48',
                   'classGrade_id'   =>   '10',
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
        Schema::dropIfExists('StudentClass');
    }
}
