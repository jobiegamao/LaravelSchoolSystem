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
                   'acadPeriod_id'   =>   '2',
                   'amount'   =>   '16000.00',
                   'description'   =>   '1st sem 2020 tuition',
                   'created_at' => '2020-06-01'
                   
            )
        );

        DB::table('Payments')->insert(
            array(
                   'person_id'   =>   '10009',
                   'acadPeriod_id'   =>   '3',
                   'amount'   =>   '16000.00',
                   'description'   =>   '2nd sem 2020 tuition',
                   'created_at' => '2020-10-01'
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
