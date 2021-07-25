<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdmissionFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_forms', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('person_details_id')
                ->constrained('person_details')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('school')->nullable();
            $table->integer('entrance_exam_grade')->nullable();
            $table->string('course_choice')->nullable();

            $table->integer('accepted_status')->default(0);
            
            $table->timestamps();
        });

        // Sample Data Insert some stuff !!! ERASE LATER 
        // --dapat sa seeders mga sample data but for now here sa
            DB::table('admission_forms')->insert(
                array(
                    'person_details_id' => '1',
                    'school' =>'Ateneo de Davao',
                    'entrance_exam_grade' => '88',
                    'course_choice' => 'IT',
                    'accepted_status' => '1'
                )
            );

            DB::table('admission_forms')->insert(
                array(
                    'person_details_id' => '2',
                    'school' =>'Ateneo de Davao',
                    'entrance_exam_grade' => '88',
                    'course_choice' => 'CS',
                    'accepted_status' => '1'
                )
            );

            // DB::table('admission_forms')->insert(
            //     array(
            //         'name' => 'Student 3',
            //         'school' =>'Ateneo de Davao',
            //         'entrance_exam_grade' => '68',
            //         'course_choice' => 'IS',
            //         'accepted_status' => '1'
            //     )
            // );

            // DB::table('admission_forms')->insert(
            //     array(
            //         'name' => 'Student 4',
            //         'school' =>'Ateneo de Davao',
            //         'entrance_exam_grade' => '68',
            //         'course_choice' => 'IT',
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
        Schema::dropIfExists('admission_forms');
    }
}
