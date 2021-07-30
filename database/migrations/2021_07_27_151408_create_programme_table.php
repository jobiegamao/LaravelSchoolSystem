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
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('code')->nullable();

            //select if the program is for undergrad, grad, post
            $table->string('level')->nullable();
        });

        DB::table('Programme')->insert(
            array(
                'id'     =>   '9991', 
                'name'   =>   'Bachelor of Science in Computer Science',
                'code'   =>   'BSCS',
                'level'   =>   'undergraduate',
            )
       );

       DB::table('Programme')->insert(
        array(
             
            'name'   =>   'Bachelor of Science in Information Technology',
            'code'   =>   'BSIT',
            'level'   =>   'undergraduate',
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
