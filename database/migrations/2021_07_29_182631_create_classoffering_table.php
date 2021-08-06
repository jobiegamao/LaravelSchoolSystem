<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassofferingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ClassOffering', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('subjCode');
            $table->foreign('subjCode')
                ->references('subjCode')
                ->on('Course')
                ->onDelete('cascade');

            $table->string('classCode');
            $table->string('schedule');

            //fk
            $table->foreignID('teacher_id')
                ->nullable()
                ->contstrained('Teacher')
                
                ->onDelete('cascade');
            
            $table->string('room');
            $table->smallInteger('semester');
            $table->smallInteger('year')->default(2021);
        });

        DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'CS 123',
                   'classCode'   =>   '4-301',
                   'schedule'   =>   'MW 7:40-9:10 AM',
                   'room'   =>   'F120',
                   'semester'   =>   '1',
                   
            )
        );

        DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'CS 123',
                   'classCode'   =>   '4-302',
                   'schedule'   =>   'TTh 9:20-10:50 AM',
                   'room'   =>   'F121',
                   'semester'   =>   '1',
                   
            )
        );

	DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'CS 246',
                   'classCode'   =>   '4-303',
                   'schedule'   =>   'MW 9:20-10:50 AM',
                   'room'   =>   'F122',
                   'semester'   =>   '1',
                   
            )
        );

        DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'CS 246',
                   'classCode'   =>   '4-304',
                   'schedule'   =>   'TTh 11:10-12:40 AM',
                   'room'   =>   'F123',
                   'semester'   =>   '1',
                   
            )
        );

	DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'PH 123',
                   'classCode'   =>   '4-305',
                   'schedule'   =>   'MW 7:40-9:10 AM',
                   'room'   =>   'F124',
                   'semester'   =>   '1',
                   
            )
        );

        DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'PH 123',
                   'classCode'   =>   '4-306',
                   'schedule'   =>   'TTh 9:20-10:50 AM',
                   'room'   =>   'F125',
                   'semester'   =>   '1',
                   
            )
        );

	DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'PSY 246',
                   'classCode'   =>   '4-307',
                   'schedule'   =>   'MW 9:20-10:50 AM',
                   'room'   =>   'F126',
                   'semester'   =>   '1',
                
            )
        );

        DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'PSY 246',
                   'classCode'   =>   '4-308',
                   'schedule'   =>   'TTh 7:40-9:10 AM',
                   'room'   =>   'F127',
                   'semester'   =>   '1',
                   
            )
        );

	DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'ELC 111',
                   'classCode'   =>   '4-309',
                   'schedule'   =>   'MW 1:30-2:30 PM',
                   'room'   =>   'F128',
                   'semester'   =>   '1',
                   
            )
        );

        DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'ELC 111',
                   'classCode'   =>   '4-310',
                   'schedule'   =>   'TTh 5:00-6:00 PM',
                   'room'   =>   'F129',
                   'semester'   =>   '1',
             
            )
        );

	DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'GE 222',
                   'classCode'   =>   '4-311',
                   'schedule'   =>   'MW 9:40-11:10 AM',
                   'room'   =>   'F130',
                   'semester'   =>   '1',
                   
            )
        );

        DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'GE 222',
                   'classCode'   =>   '4-312',
                   'schedule'   =>   'MW 5:40-7:10 PM',
                   'room'   =>   'F131',
                   'semester'   =>   '1',
                 
            )
        );

	DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'GE 222',
                   'classCode'   =>   '4-313',
                   'schedule'   =>   'TTh 1:30-3:00 PM',
                   'room'   =>   'F132',
                   'semester'   =>   '2',
                   
            )
        );

        DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'GE 222',
                   'classCode'   =>   '4-314',
                   'schedule'   =>   'TTh 5:40-7:10 PM',
                   'room'   =>   'F133',
                   'semester'   =>   '2',
                 
            )
        );

	DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'PSY 333',
                   'classCode'   =>   '4-315',
                   'schedule'   =>   'MW 7:40-9:10 AM',
                   'room'   =>   'F134',
                   'semester'   =>   '2',
                   
            )
        );

        DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'PSY 333',
                   'classCode'   =>   '4-316',
                   'schedule'   =>   'TTh 7:40-9:10 AM',
                   'room'   =>   'F135',
                   'semester'   =>   '2',
               
            )
        );

	DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'ET 111',
                   'classCode'   =>   '4-317',
                   'schedule'   =>   'MW 7:40-9:10 AM',
                   'room'   =>   'F136',
                   'semester'   =>   '1',
                 
            )
        );

        DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'ET 111',
                   'classCode'   =>   '4-318',
                   'schedule'   =>   'TTh 9:20-10:50 AM',
                   'room'   =>   'F137',
                   'semester'   =>   '1',
                  
            )
        );

	DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'ET 111',
                   'classCode'   =>   '4-319',
                   'schedule'   =>   'MW 1:30-3:00 PM',
                   'room'   =>   'F138',
                   'semester'   =>   '2',
                   
            )
        );

        DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'ET 111',
                   'classCode'   =>   '4-320',
                   'schedule'   =>   'TTh 1:30-3:00 PM',
                   'room'   =>   'F139',
                   'semester'   =>   '2',
                   
            )
        );

	DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'CS 2222',
                   'classCode'   =>   '4-321',
                   'schedule'   =>   'MW 7:40-9:10 AM',
                   'room'   =>   'F140',
                   'semester'   =>   '2',
                   
            )
        );

        DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'CS 2222',
                   'classCode'   =>   '4-322',
                   'schedule'   =>   'TTh 9:20-10:50 AM',
                   'room'   =>   'F141',
                   'semester'   =>   '2',
                  
            )
        );

	DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'ELC 222',
                   'classCode'   =>   '4-323',
                   'schedule'   =>   'MW 1:30-2:30 PM',
                   'room'   =>   'F142',
                   'semester'   =>   '2',
                   
            )
        );

        DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'ELC 222',
                   'classCode'   =>   '4-324',
                   'schedule'   =>   'TTh 9:20-10:50 AM',
                   'room'   =>   'F143',
                   'semester'   =>   '2',
                   
            )
        );

	DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'CS 456',
                   'classCode'   =>   '4-325',
                   'schedule'   =>   'MW 7:40-9:10 AM',
                   'room'   =>   'F144',
                   'semester'   =>   '2',
                  
            )
        );

        DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'CS 456',
                   'classCode'   =>   '4-326',
                   'schedule'   =>   'TTh 9:20-10:50 AM',
                   'room'   =>   'F145',
                   'semester'   =>   '2',
                  
            )
        );

	DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'CHE 22111',
                   'classCode'   =>   '4-327',
                   'schedule'   =>   'MW 9:20-10:50 AM',
                   'room'   =>   'F146',
                   'semester'   =>   '1',
                   
            )
        );

        DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'CHE 22111',
                   'classCode'   =>   '4-328',
                   'schedule'   =>   'TTh 7:40-9:10 AM',
                   'room'   =>   'F147',
                   'semester'   =>   '1',
               
            )
        );

	DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'DIFF 22222',
                   'classCode'   =>   '4-329',
                   'schedule'   =>   'MW 7:40-9:10 AM',
                   'room'   =>   'F148',
                   'semester'   =>   '1',
                   
            )
        );

        DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'DIFF 22222',
                   'classCode'   =>   '4-330',
                   'schedule'   =>   'TTh 1:30-3:00 PM',
                   'room'   =>   'F149',
                   'semester'   =>   '1',
                  
            )
        );

	DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'APP 11111',
                   'classCode'   =>   '4-331',
                   'schedule'   =>   'MW 1:00-2:00 PM',
                   'room'   =>   'F150',
                   'semester'   =>   '1',
                   
            )
        );

        DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'APP 11111',
                   'classCode'   =>   '4-332',
                   'schedule'   =>   'TTh 5:40-6:40 PM',
                   'room'   =>   'F151',
                   'semester'   =>   '1',
                   
            )
        );

        DB::table('ClassOffering')->insert(
                array(
                    'subjCode'   =>   'CHE 22444',
                    'classCode'   =>   '4-333',
                    'schedule'   =>   'TTh 7:40-9:10 AM',
                    'room'   =>   'F152',
                    'semester'   =>   '1',
                    
                )
            );
        DB::table('ClassOffering')->insert(
                array(
                    'subjCode'   =>   'CHE 22444',
                    'classCode'   =>   '4-334',
                    'schedule'   =>   'MW 5:40-7:10 PM',
                    'room'   =>   'F153',
                    'semester'   =>   '1',
                    
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
        Schema::dropIfExists('ClassOffering');
    }
}
