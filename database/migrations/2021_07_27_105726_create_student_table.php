<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Student', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignID('person_id')
                ->contstrained('Person')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->tinyInteger('year')->nullable();
            $table->string('section')->nullable();

            //is enrolled for the new semester?
            $table->boolean('isEnrolled')->default(0);
            //is New student?
            $table->boolean('isNew')->default(1);
            //pass for next enrollment
            $table->boolean('isPass')->default(0);

            $table->boolean('isGrad')->default(0);

        });

        DB::table('Student')->insert(
            array(
                   'id'   =>   '20001',
                   'person_id'   =>   '10006',
		            'year'   =>   '1',
            )
        );

        DB::table('Student')->insert(
            array(
                   'id'   =>   '20002',
                   'person_id'   =>   '10007',
		           'year'   =>   '1',
            )
        );

        DB::table('Student')->insert(
            array(
                   'id'   =>   '20003',
                   'person_id'   =>   '10008',
		           'year'   =>   '1',
            )
        );

        DB::table('Student')->insert(
            array(
                   'id'   =>   '20004',
                   'person_id'   =>   '10009',
                    'year'   =>   '2',
                    'isNew'   =>   '0',
            )
        );

        DB::table('Student')->insert(
            array(
                   'id'   =>   '20005',
                   'person_id'   =>   '10010',
                    'year'   =>   '4',
                    'isNew'   =>   '0',
                    'isGrad'   =>   '1',
            )
        );

        DB::table('Student')->insert(
            array(
                   'id'   =>   '20005',
                   'person_id'   =>   '10010',
		  'year'   =>   '4',
		  'isNew'   =>   '0',
		  'isGrad'   => '1',
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
        Schema::dropIfExists('Student');
    }
}
