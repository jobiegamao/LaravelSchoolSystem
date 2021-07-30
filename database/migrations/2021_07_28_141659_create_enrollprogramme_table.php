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
            

            $table->foreignID('student_id')
                ->contstrained('Student')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignID('programme_id')
                ->contstrained('Programme')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        
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
