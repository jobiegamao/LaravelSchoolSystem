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
