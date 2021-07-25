<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // DETAILS of every person in school
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('mname')->nullable();
            $table->string('sname')->nullable(); //suffix
            $table->date('birthdate')->nullable();
        });

        // Sample Data Insert some stuff !!! ERASE LATER 
        // --dapat sa seeders mga sample data but for now here sa
            DB::table('person_details')->insert(
                array(
                    'fname' => 'John',
                    'lname' =>'Doe',
                    'mname' => 'Diaz',
                    'sname' => 'Jr.',
                    'birthdate' => '2000-01-02'
                )
            );

            DB::table('person_details')->insert(
                array(
                    'fname' => 'Mary',
                    'lname' =>'Obrero',
                    'mname' => 'San Juan',
                    'birthdate' => '2003-02-14'
                )
            );

            DB::table('person_details')->insert(
                array(
                    'fname' => 'Jenny',
                    'lname' =>'Cruz',
                    'mname' => 'San Juan',
                    'birthdate' => '2003-02-14'
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
        Schema::dropIfExists('person_details');
    }
}
