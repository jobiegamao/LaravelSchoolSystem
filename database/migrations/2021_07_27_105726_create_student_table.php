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

            $table->string('year');
            $table->string('section')->nullable();
            $table->boolean('isEnrolled')->default(0);
            $table->boolean('isNew')->default(0);
            $table->boolean('isPass')->default(0);


            //$table->string('role')->default('Student');
        });

        DB::table('Student')->insert(
            array(
                   'id'     =>   '101', 
                   'person_id'   =>   '1001',
                   'year'   =>   '1st',
            )
       );
       DB::table('Student')->insert(
            array(
                 
                'person_id'   =>   '1002',
                'year'   =>   '1st',
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
