<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassgradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ClassGrade', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->float('prelimGrade')->nullable();
            $table->float('midtermGrade')->nullable();
            $table->float('prefinalsGrade')->nullable();
            $table->float('finalsGrade')->nullable();

            $table->boolean('isPass')->default(0);
        });

        DB::table('ClassGrade')->insert(
            array(
                   'prelimGrade'   =>   '86',
                   'midtermGrade'   =>   '90',
                   'prefinalsGrade'   =>   '88',
                   'finalsGrade' => '100',
		             'isPass'   =>  '1',
            )
         );

	DB::table('ClassGrade')->insert(
            array(
                   'prelimGrade'   =>   '89',
                   'midtermGrade'   =>   '92',
                   'prefinalsGrade'   =>   '85',
                   'finalsGrade' => '100',
		             'isPass'   =>  '1',
            )
         );

	DB::table('ClassGrade')->insert(
            array(
                   'prelimGrade'   =>   '70',
                   'midtermGrade'   =>   '70',
                   'prefinalsGrade'   =>   '71',
                   'finalsGrade' => '70',
		             'isPass'   => '0',
            )
         );

	DB::table('ClassGrade')->insert(
            array(
                   'prelimGrade'   =>   '88',
                   'midtermGrade'   =>   '89',
                   'prefinalsGrade'   =>   '90',
                   'finalsGrade' => '100',
		            'isPass'   =>  '1',
            )
         );

         DB::table('ClassGrade')->insert(
            array(
                   'prelimGrade'   =>   '83',
                   'midtermGrade'   =>   '84',
                   'prefinalsGrade'   =>   '89',
                   'finalsGrade' => '100',
		  'isPass'   =>  '1',
            )
         );

	DB::table('ClassGrade')->insert(
            array(
                   'prelimGrade'   =>   '84',
                   'midtermGrade'   =>   '85',
                   'prefinalsGrade'   =>   '92',
                   'finalsGrade' => '100',
		  'isPass'   =>  '1',
            )
         );

	DB::table('ClassGrade')->insert(
            array(
                   'prelimGrade'   =>   '85',
                   'midtermGrade'   =>   '87',
                   'prefinalsGrade'   =>   '93',
                   'finalsGrade' => '100',
		  'isPass'   =>  '1',
            )
         );

	DB::table('ClassGrade')->insert(
            array(
                   'prelimGrade'   =>   '86',
                   'midtermGrade'   =>   '85',
                   'prefinalsGrade'   =>   '93',
                   'finalsGrade' => '100',
		  'isPass'   =>  '1',
            )
         );

	DB::table('ClassGrade')->insert(
            array(
                   'prelimGrade'   =>   '87',
                   'midtermGrade'   =>   '89',
                   'prefinalsGrade'   =>   '91',
                   'finalsGrade' => '100',
		  'isPass'   =>  '1',
            )
         );
	
	DB::table('ClassGrade')->insert(
            array(
                   'prelimGrade'   =>   '88',
                   'midtermGrade'   =>   '90',
                   'prefinalsGrade'   =>   '89',
                   'finalsGrade' => '100',
		  'isPass'   =>  '1',
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
        Schema::dropIfExists('ClassGrade');
    }
}
