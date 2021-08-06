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

            $table->smallInteger('semester');
            $table->smallInteger('year');

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
