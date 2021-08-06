<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemesterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AcadPeriod', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->smallInteger('acadSem');
            $table->smallInteger('acadYear');
        });

        DB::table('AcadPeriod')->insert(
            array(
                   'acadSem'   =>   '1',
                   'acadYear'   =>   '2021',
                   "created_at" =>  date('Y-m-d H:i:s'),
                  "updated_at" => date('Y-m-d H:i:s'),
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
        
        
        Schema::dropIfExists('AcadPeriod');
    }
}
