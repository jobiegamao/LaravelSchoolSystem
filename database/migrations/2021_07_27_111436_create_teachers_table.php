<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignID('person_id')
                ->contstrained('Person')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });

        

        DB::table('Teachers')->insert(
            array(
                'id'   =>   '30001',
                'person_id'   =>   '10003',
            )
        );
        DB::table('Teachers')->insert(
            array( 
                'person_id'   =>   '10004',
            )
        );
        DB::table('Teachers')->insert(
            array( 
                'person_id'   =>   '10005',
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
        Schema::dropIfExists('Teachers');
    }
}
