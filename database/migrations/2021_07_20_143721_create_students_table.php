<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('students', function (Blueprint $table) {
            // from admission, register admission, then create student ID
            $table->id();

            $table->bigInteger('register_admission_id')->unsigned();
        
            $table->timestamps();

            $table->foreign('register_admission_id')
                ->references('id')
                ->on('register_admission')
                ->onDelete('cascade');
        });
        DB::statement('ALTER TABLE students AUTO_INCREMENT = 10000;');
       
        //SAMPLE SEED !!move to seeders later
        // DB::table('students')->insert(
        //     array(
        //         'admission_id' => '1'
        //     )
        // );

        // DB::table('students')->insert(
        //     array(
        //         'admission_id' => '2'
        //     )
        // );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
