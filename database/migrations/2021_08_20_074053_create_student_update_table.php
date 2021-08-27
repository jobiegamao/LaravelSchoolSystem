<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentUpdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('StudentUpdate', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignID('student_id')
                ->contstrained('Student')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignID('acadPeriod_id')
                ->contstrained('AcadPeriod')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignID('fees_id')
                ->contstrained('Fees')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // $table->decimal('qpi', 3, 2)->nullable()->default(0.00);
            $table->decimal('final', 4, 2)->nullable()->default(00.00);
            $table->tinyInteger('units')->nullable()->default(0);
            $table->tinyInteger('unitsTook')->nullable()->default(0);


            // $table->decimal('oldBal', 10, 2)->nullable()->default(0.00);
            $table->decimal('balance', 10, 2)->nullable()->default(0.00);
            $table->decimal('currDue', 10, 2)->nullable()->default(0.00);
            $table->decimal('adjustments', 10, 2)->nullable()->default(0.00);

            $table->boolean('isGrad')->default(0);
        });

        DB::table('StudentUpdate')->insert(
            array(
                   'student_id'   =>   '20004',
                   'acadPeriod_id'   =>   '2',
                   'fees_id'   =>   '1',
                   'units'   =>   '15',
                   'unitsTook'   =>   '6',
                   'final'   =>   '88.36',
                   'currDue'   =>   '16000.00',
                   
                   
            )
        );

        DB::table('StudentUpdate')->insert(
            array(
                   'student_id'   =>   '20004',
                   'acadPeriod_id'   =>   '3',
                   'fees_id'   =>   '1',
                   'units'   =>   '15',
                   'unitsTook'   =>   '6',
                   'final'   =>   '79.67',
                   'currDue'   =>   '16000.00',
                   
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
        Schema::dropIfExists('StudentUpdate');
    }
}
