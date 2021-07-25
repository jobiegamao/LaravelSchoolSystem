<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_admission', function (Blueprint $table) {
            // from admission, register admission 
            $table->id(); //(control id for new enrollment) //register_admission_id

            $table->bigInteger('admission_id')->unsigned();
            
            $table->boolean('registration_status')->nullable()->default(0);
            $table->boolean('financeApproval_status')->nullable()->default(0);

            $table->bigInteger('course_1')->nullable(); //id for course
            $table->bigInteger('course_2')->nullable();

            $table->integer('acad_year')->nullable()->default(2021);
            $table->string('acad_sem')->nullable()->default('1st');
            
            
            $table->timestamps();

            $table->foreign('admission_id')
                ->references('id')
                ->on('admission_forms')
                ->onDelete('cascade');
                
        });
        DB::statement('ALTER TABLE register_admission AUTO_INCREMENT = 2021000;');
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
