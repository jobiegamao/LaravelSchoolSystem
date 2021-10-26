<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseFeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CourseFee', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('subjCode');
            $table->foreign('subjCode')
                ->references('subjCode')
                ->on('Course')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->decimal('labFee', 10, 2)->nullable()->default(0.00);
            
            $table->foreignID('acadPeriod_id')
            ->contstrained('acadPeriod')
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });

        

        DB::table('CourseFee')->insert(
            array(
                'subjCode'   =>   'CHE 22224',
                'acadPeriod_id' => '7',
                'labFee' => '1000.00'
                )
        );
        DB::table('CourseFee')->insert(
            array(
                'subjCode'   =>   'CS 123',
                'acadPeriod_id' => '10',
                'labFee' => '1000.00'
                )
        );
        
        DB::table('CourseFee')->insert(
                    array(
                           'subjCode'   =>   'CS 246',
                           'acadPeriod_id' => '10',
                           'labFee' => '1000.00'
                    )
                );
        
        DB::table('CourseFee')->insert(
                    array(
                           'subjCode'   =>   'CS 2222',
                           'acadPeriod_id' => '10',
                           'labFee' => '1000.00'
                    )
                );
        
        DB::table('CourseFee')->insert(
                    array(
                           'subjCode'   =>   'CS 456',
                           'acadPeriod_id' => '10',
                           'labFee' => '1000.00'
                    )
                );
        DB::table('CourseFee')->insert(
                    array(
                           'subjCode'   =>   'CHE 22111',
                           'acadPeriod_id' => '10',
                           'labFee' => '1000.00'
                    )
                );
        DB::table('CourseFee')->insert(
                    array(
                           'subjCode'   =>   'CHE 22444',
                           'acadPeriod_id' => '10',
                           'labFee' => '1000.00'
                    )
                );
        DB::table('CourseFee')->insert(
                    array(
                           'subjCode'   =>   'CHE 22224',
                           'acadPeriod_id' => '10',
                           'labFee' => '1000.00'
                    )
                );
        DB::table('CourseFee')->insert(
                    array(
                           'subjCode'   =>   'CHE 22226',
                           'acadPeriod_id' => '10',
                           'labFee' => '1000.00'
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
        Schema::dropIfExists('CourseFee');
    }
}
