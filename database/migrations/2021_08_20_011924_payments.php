<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Payments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Payments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignID('person_id')
                    ->contstrained('Person')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreignID('acadPeriod_id')
                    ->contstrained('acadPeriod')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->decimal('amount', 10, 2)->nullable();
        
            $table->text('description')->nullable();
        });

        DB::table('Payments')->insert(
            array(
                   'person_id'   =>   '10009',
                   'acadPeriod_id'   =>   '7',
                   'amount'   =>   '16000.00',
                   'description'   =>   '1st sem 2020 tuition',
                   'created_at' => '2020-06-01'
                   
            )
        );

        DB::table('Payments')->insert(
            array(
                   'person_id'   =>   '10009',
                   'acadPeriod_id'   =>   '8',
                   'amount'   =>   '16000.00',
                   'description'   =>   '2nd sem 2020 tuition',
                   'created_at' => '2020-10-01'
            )
        );

        //payments of 4th yr student
        DB::table('Payments')->insert(
            array(
                   'person_id'   =>   '10010',
                   'acadPeriod_id'   =>   '1',
                   'amount'   =>   '13000.00',
                   'description'   =>   '1st sem 2018 tuition',
                   'created_at' => '2018-06-05'
            )
        );

        DB::table('Payments')->insert(
                    array(
                        'person_id'   =>   '10010',
                        'acadPeriod_id'   =>   '2',
                        'amount'   =>   '13000.00',
                        'description'   =>   '2nd sem 2018 tuition',
                        'created_at' => '2018-10-06'
                    )
                );

        DB::table('Payments')->insert(
                    array(
                        'person_id'   =>   '10010',
                        'acadPeriod_id'   =>   '4',
                        'amount'   =>   '13000.00',
                        'description'   =>   '1st sem 2019 tuition',
                        'created_at' => '2019-06-02'
                    )
                );

        DB::table('Payments')->insert(
                    array(
                        'person_id'   =>   '10010',
                        'acadPeriod_id'   =>   '5',
                        'amount'   =>   '13000.00',
                        'description'   =>   '2nd sem 2019 tuition',
                        'created_at' => '2019-10-05'
                    )
                );

        DB::table('Payments')->insert(
                    array(
                        'person_id'   =>   '10010',
                        'acadPeriod_id'   =>   '7',
                        'amount'   =>   '14000.00',
                        'description'   =>   '1st sem 2020 tuition',
                        'created_at' => '2020-06-12'
                    )
                );

        DB::table('Payments')->insert(
                    array(
                        'person_id'   =>   '10010',
                        'acadPeriod_id'   =>   '8',
                        'amount'   =>   '13000.00',
                        'description'   =>   '2nd sem 2020 tuition',
                        'created_at' => '2020-10-10'
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
        Schema::dropIfExists('Payments');
    }
}
