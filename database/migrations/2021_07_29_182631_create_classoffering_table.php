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
                ->onUpdate('cascade');

            $table->string('classCode');
            $table->string('schedule');

            //fk
            $table->foreignID('teacher_id')
                ->nullable()
                ->contstrained('Teacher')
                ->onUpdate('cascade');
            
            $table->string('room');
            $table->smallInteger('semester');
            $table->smallInteger('year')->default(2021);
        });

        DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'CS 123',
                     'classCode'   =>   '4-301',
                     'schedule'   =>   'MW 7:40-9:10 AM',
                  'teacher_id'  =>   '30001',
                     'room'   =>   'F120',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'CS 123',
                     'classCode'   =>   '4-302',
                     'schedule'   =>   'TTh 9:20-10:50 AM',
                  'teacher_id'  =>   '30001',
                     'room'   =>   'F121',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'CS 246',
                     'classCode'   =>   '4-303',
                     'schedule'   =>   'MW 9:20-10:50 AM',
                  'teacher_id'  =>   '30001',
                     'room'   =>   'F122',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'CS 246',
                     'classCode'   =>   '4-304',
                     'schedule'   =>   'TTh 11:10-12:40 AM',
                  'teacher_id'  =>   '30001',
                     'room'   =>   'F123',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'PH 123',
                     'classCode'   =>   '4-305',
                     'schedule'   =>   'MW 7:40-9:10 AM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F124',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'PH 123',
                     'classCode'   =>   '4-306',
                     'schedule'   =>   'TTh 9:20-10:50 AM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F125',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'PSY 246',
                     'classCode'   =>   '4-307',
                     'schedule'   =>   'MW 9:20-10:50 AM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F126',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'PSY 246',
                     'classCode'   =>   '4-308',
                     'schedule'   =>   'TTh 7:40-9:10 AM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F127',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'ELC 111',
                     'classCode'   =>   '4-309',
                     'schedule'   =>   'MW 1:30-2:30 PM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F128',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'ELC 111',
                     'classCode'   =>   '4-310',
                     'schedule'   =>   'TTh 5:40-6:40 PM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F129',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'GE 222',
                     'classCode'   =>   '4-311',
                     'schedule'   =>   'MW 9:40-11:10 AM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F130',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'GE 222',
                     'classCode'   =>   '4-312',
                     'schedule'   =>   'MW 5:40-7:10 PM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F131',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'GE 222',
                     'classCode'   =>   '4-313',
                     'schedule'   =>   'TTh 1:30-3:00 PM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F132',
                     'semester'   =>   '2',
                     'year'   =>   '2021',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'GE 222',
                     'classCode'   =>   '4-314',
                     'schedule'   =>   'TTh 5:40-7:10 PM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F133',
                     'semester'   =>   '2',
                     'year'   =>   '2021',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'PSY 333',
                     'classCode'   =>   '4-315',
                     'schedule'   =>   'MW 7:40-9:10 AM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F134',
                     'semester'   =>   '2',
                     'year'   =>   '2021',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'PSY 333',
                     'classCode'   =>   '4-316',
                     'schedule'   =>   'TTh 7:40-9:10 AM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F135',
                     'semester'   =>   '2',
                     'year'   =>   '2021',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'ET 111',
                     'classCode'   =>   '4-317',
                     'schedule'   =>   'MW 7:40-9:10 AM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F136',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'ET 111',
                     'classCode'   =>   '4-318',
                     'schedule'   =>   'TTh 9:20-10:50 AM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F137',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'ET 111',
                     'classCode'   =>   '4-319',
                     'schedule'   =>   'MW 1:30-3:00 PM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F138',
                     'semester'   =>   '2',
                     'year'   =>   '2021',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'ET 111',
                     'classCode'   =>   '4-320',
                     'schedule'   =>   'TTh 1:30-3:00 PM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F139',
                     'semester'   =>   '2',
                     'year'   =>   '2021',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'CS 2222',
                     'classCode'   =>   '4-321',
                     'schedule'   =>   'MW 7:40-9:10 AM',
                  'teacher_id'  =>   '30001',
                     'room'   =>   'F140',
                     'semester'   =>   '2',
                     'year'   =>   '2021',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'CS 2222',
                     'classCode'   =>   '4-322',
                     'schedule'   =>   'TTh 9:20-10:50 AM',
                  'teacher_id'  =>   '30001',
                     'room'   =>   'F141',
                     'semester'   =>   '2',
                     'year'   =>   '2021',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'ELC 222',
                     'classCode'   =>   '4-323',
                     'schedule'   =>   'MW 1:30-2:30 PM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F142',
                     'semester'   =>   '2',
                     'year'   =>   '2021',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'ELC 222',
                     'classCode'   =>   '4-324',
                     'schedule'   =>   'TTh 9:20-10:50 AM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F143',
                     'semester'   =>   '2',
                     'year'   =>   '2021',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'CS 456',
                     'classCode'   =>   '4-325',
                     'schedule'   =>   'MW 7:40-9:10 AM',
                  'teacher_id'  =>   '30001',
                     'room'   =>   'F144',
                     'semester'   =>   '2',
                     'year'   =>   '2021',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'CS 456',
                     'classCode'   =>   '4-326',
                     'schedule'   =>   'TTh 9:20-10:50 AM',
                  'teacher_id'  =>   '30001',
                     'room'   =>   'F145',
                     'semester'   =>   '2',
                     'year'   =>   '2021',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'CHE 22111',
                     'classCode'   =>   '4-327',
                     'schedule'   =>   'MW 9:20-10:50 AM',
                  'teacher_id'  =>   '30003',
                     'room'   =>   'F146',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'CHE 22111',
                     'classCode'   =>   '4-328',
                     'schedule'   =>   'TTh 7:40-9:10 AM',
                  'teacher_id'  =>   '30003',
                     'room'   =>   'F147',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'DIFF 22222',
                     'classCode'   =>   '4-329',
                     'schedule'   =>   'MW 7:40-9:10 AM',
                  'teacher_id'  =>   '30003',
                     'room'   =>   'F148',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'DIFF 22222',
                     'classCode'   =>   '4-330',
                     'schedule'   =>   'TTh 1:30-3:00 PM',
                  'teacher_id'  =>   '30003',
                     'room'   =>   'F149',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'APP 11111',
                     'classCode'   =>   '4-331',
                     'schedule'   =>   'MW 1:30-2:30 PM',
                  'teacher_id'  =>   '30003',
                     'room'   =>   'F150',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'APP 11111',
                     'classCode'   =>   '4-332',
                     'schedule'   =>   'TTh 5:40-6:40 PM',
                  'teacher_id'  =>   '30003',
                     'room'   =>   'F151',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'CHE 22444',
                     'classCode'   =>   '4-333',
                     'schedule'   =>   'TTh 7:40-9:10 AM',
                  'teacher_id'  =>   '30003',
                     'room'   =>   'F152',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'CHE 22444',
                     'classCode'   =>   '4-334',
                     'schedule'   =>   'MW 5:40-7:10 PM',
                  'teacher_id'  =>   '30003',
                     'room'   =>   'F153',
                     'semester'   =>   '1',
                     'year'   =>   '2021',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'CHE 22222',
                     'classCode'   =>   '4-335',
                     'schedule'   =>   'MW 7:40-9:10 AM',
                  'teacher_id'  =>   '30003',
                     'room'   =>   'F154',
                     'semester'   =>   '1',
                     'year'   =>   '2020',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'CHE 22222',
                     'classCode'   =>   '4-336',
                     'schedule'   =>   'TTh 5:40-7:10 PM',
                  'teacher_id'  =>   '30003',
                     'room'   =>   'F155',
                     'semester'   =>   '1',
                     'year'   =>   '2020',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'CHE 22333',
                     'classCode'   =>   '4-337',
                     'schedule'   =>   'MW 1:30-3:00 PM',
                  'teacher_id'  =>   '30003',
                     'room'   =>   'F156',
                     'semester'   =>   '2',
                     'year'   =>   '2020',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'CHE 22333',
                     'classCode'   =>   '4-338',
                     'schedule'   =>   'TTh 9:20-10:50 AM',
                  'teacher_id'  =>   '30003',
                     'room'   =>   'F157',
                     'semester'   =>   '2',
                     'year'   =>   '2020',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'TRIG 11111',
                     'classCode'   =>   '4-339',
                     'schedule'   =>   'MW 9:20-10:50 AM',
                  'teacher_id'  =>   '30003',
                     'room'   =>   'F158',
                     'semester'   =>   '2',
                     'year'   =>   '2020',
              )
          );
  
          DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'TRIG 11111',
                     'classCode'   =>   '4-340',
                     'schedule'   =>   'TTh 1:30-3:00 PM',
                  'teacher_id'  =>   '30003',
                     'room'   =>   'F159',
                     'semester'   =>   '2',
                     'year'   =>   '2020',
              )
          );
  
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'GE 222',
                     'classCode'   =>   '4-341',
                     'schedule'   =>   'MW 9:20-10:20 AM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F160',
                     'semester'   =>   '1',
                     'year'   =>   '2020',
              )
          );
         DB::table('ClassOffering')->insert(
              array(
                     'subjCode'   =>   'GE 222',
                     'classCode'   =>   '4-342',
                     'schedule'   =>   'TTh 11:10-12:10 AM',
                  'teacher_id'  =>   '30002',
                     'room'   =>   'F161',
                     'semester'   =>   '1',
                     'year'   =>   '2020',
              )
          );

          DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'CHE 22222',
                   'classCode'   =>   '4-343',
                   'schedule'   =>   'TTh 5:40-7:10 PM',
		  'teacher_id'  =>   '30003',
                   'room'   =>   'F162',
                   'semester'   =>   '1',
                   'year'   =>   '2018',
            )
        );

	   DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'TRIG 11111',
                   'classCode'   =>   '4-344',
                   'schedule'   =>   'MW 1:30-3:00 PM',
		  'teacher_id'  =>   '30001',
                   'room'   =>   'F163',
                   'semester'   =>   '2',
                   'year'   =>   '2018',
            )
        );

	   DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'DIFF 22222',
                   'classCode'   =>   '4-345',
                   'schedule'   =>   'TTh 9:20-10:50 AM',
		  'teacher_id'  =>   '30001',
                   'room'   =>   'F164',
                   'semester'   =>   '1',
                   'year'   =>   '2019',
            )
        );

	   DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'CHE 22223',
                   'classCode'   =>   '4-346',
                   'schedule'   =>   'MW 9:20-10:50 AM',
		  'teacher_id'  =>   '30003',
                   'room'   =>   'F165',
                   'semester'   =>   '2',
                   'year'   =>   '2019',
            )
        );

	   DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'CHE 22224',
                   'classCode'   =>   '4-347',
                   'schedule'   =>   'TTh 1:30-3:00 PM',
		  'teacher_id'  =>   '30003',
                   'room'   =>   'F166',
                   'semester'   =>   '1',
                   'year'   =>   '2020',
            )
        );

	   DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'CHE 22225',
                   'classCode'   =>   '4-348',
                   'schedule'   =>   'MW 9:20-10:20 AM',
		  'teacher_id'  =>   '30003',
                   'room'   =>   'F167',
                   'semester'   =>   '2',
                   'year'   =>   '2020',
            )
        );

	   DB::table('ClassOffering')->insert(
            array(
                   'subjCode'   =>   'CHE 22226',
                   'classCode'   =>   '4-349',
                   'schedule'   =>   'TTh 11:10-12:10 AM',
		  'teacher_id'  =>   '30003',
                   'room'   =>   'F168',
                   'semester'   =>   '1',
                   'year'   =>   '2021',
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
