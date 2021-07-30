<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Person', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->string('lname')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('sname')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('sex')->nullable();
            $table->string('email')->nullable();
            $table->integer('contactNo')->nullable();
            $table->string('emergencyContactName')->nullable();
            $table->integer('emergencyContactNo')->nullable();
            $table->string('address')->nullable();
            $table->string('passsword')->nullable();
            $table->string('role')->nullable();

            
        });

        DB::table('Person')->insert(
            array(
                   'id'     =>   '1001', 
                   'lname'   =>   'Lopez',
                   'fname'   =>   'Dayle',
                   'mname'   =>   'Cruz',
            )
       );
       DB::table('Person')->insert(
        array(
               
               'lname'   =>   'Santos',
               'fname'   =>   'Charlie',
               'mname'   =>   'David',
               'sname'   =>   'Jr.',
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
        Schema::dropIfExists('Person');
    }
}
