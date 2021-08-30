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
                   'classOffering_id'   =>   '35',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   '36',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   '37',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   '38',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   '39',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   '40',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   '41',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   '42',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   '43',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   '44',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   '45',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   '46',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   '47',
            )
         );

         DB::table('GradeReports')->insert(
            array(
                   'classOffering_id'   =>   '48',
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
