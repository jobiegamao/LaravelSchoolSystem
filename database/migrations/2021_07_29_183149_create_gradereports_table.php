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

            $table->foreignID('studentClass_id')
                ->nullable()
                ->contstrained('StudentClass')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignID('teacher_id')
                ->nullable()
                ->contstrained('Teacher')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->boolean('isPass')->nullable()->default(1);

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
