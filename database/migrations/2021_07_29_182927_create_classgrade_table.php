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
        });
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