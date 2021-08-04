<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Programme', function (Blueprint $table) {
            
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('progCode')->primary();

            //select if the program is for undergrad, grad, post
            $table->string('level')->nullable();
        });

        DB::table('Programme')->insert(
            array(
		            'progCode' =>   'BSCS',
                   'name'   =>   'BS in Computer Science',
                   'level'   =>   'Undergraduate',
            )
        );

        DB::table('Programme')->insert(
            array(
		  'progCode' =>   'BSPSYCH',
                   'name'   =>   'BS in Psychology',
                   'level'   =>   'Undergraduate',
            )
        );

	DB::table('Programme')->insert(
            array(
		  'progCode' =>   'ABPHILO',
                   'name'   =>   'AB in Philosophy',
                   'level'   =>   'Undergraduate',
            )
        );

        DB::table('Programme')->insert(
            array(
		  'progCode' =>   'BSCHE',
                   'name'   =>   'BS in Chemical Engineering',
                   'level'   =>   'Undergraduate',
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
        Schema::dropIfExists('Programme');
    }
}
