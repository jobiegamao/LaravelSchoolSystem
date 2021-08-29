<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradereportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GradeReports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignID('classOffering_id')
                ->contstrained('ClassOffering')
                ->onUpdate('cascade')
                ->onDelete('cascade');


        });

        DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   'CHE 22222',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   'CHE 22222',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   'CHE 22333',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   'CHE 22333',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   'TRIG 11111',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   'TRIG 11111',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   'GE 222',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   'GE 222',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   'CHE 22222',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   'TRIG 11111',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   'DIFF 22222',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   'CHE 22223',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   'CHE 22224',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   'CHE 22225',
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
        Schema::dropIfExists('GradeReports');
    }
}
