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
                   'id'   =>   '10001',
                   'lname'   =>   'Gomez',
		  'fname'   =>   'Jay',
		  'mname'   =>   'M',
		  'role'   =>   'Super Admin',
            )
        );

        DB::table('Person')->insert(
            array(
                   'id'   =>   '10002',
                   'lname'   =>   'Gray',
		  'fname'   =>   'Keith',
		  'mname'   =>   'N',
		  'role'   =>   'Registrar',
            )
        );

        DB::table('Person')->insert(
            array(
                   'id'   =>   '10003',
                   'lname'   =>   'Jones',
		  'fname'   =>   'Kim',
		  'mname'   =>   'A',
		  'role'   =>   'Teacher',
            )
        );

        DB::table('Person')->insert(
            array(
                   'id'   =>   '10004',
                   'lname'   =>   'Ibarra',
		  'fname'   =>   'Cris',
		  'mname'   =>   'W',
		  'role'   =>   'Teacher',
            )
        );

        DB::table('Person')->insert(
            array(
                   'id'   =>   '10005',
                   'lname'   =>   'Perez',
		  'fname'   =>   'Jake',
		  'mname'   =>   'K',
		  'role'   =>   'Teacher',
            )
        );

        DB::table('Person')->insert(
            array(
                   'id'   =>   '10006',
                   'lname'   =>   'Cruz',
		  'fname'   =>   'Kate',
		  'mname'   =>   'B',
		  'role'   =>   'Student',
            )
        );

        DB::table('Person')->insert(
            array(
                   'id'   =>   '10007',
                   'lname'   =>   'Dizon',
		  'fname'   =>   'Jim',
		  'mname'   =>   'C',
		  'role'   =>   'Student',
            )
        );

        DB::table('Person')->insert(
        array(
            'id'   =>   '10008',
            'lname'   =>   'Pratt',
            'fname'   =>   'Cami',
            'mname'   =>   'H',
            'role'   =>   'Student',
                )
            );

        DB::table('Person')->insert(
        array(
            'id'   =>   '10009',
            'lname'   =>   'Smith',
		  'fname'   =>   'Coleen',
		  'mname'   =>   'K',
		  'role'   =>   'Student',
            )
        );

        DB::table('Person')->insert(
            array(
                   'id'   =>   '10010',
                   'lname'   =>   'Ano',
		  'fname'   =>   'Andre',
		  'mname'   =>   'A',
		  'role'   =>   'Student',
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
