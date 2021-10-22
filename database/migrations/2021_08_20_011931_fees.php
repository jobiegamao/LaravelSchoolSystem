<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Fees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignID('acadPeriod_id')
                    ->contstrained('acadPeriod')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->decimal('unitsFee', 10, 2)->nullable();
            $table->decimal('regFee', 10, 2)->nullable();
            $table->decimal('misc_dcb', 10, 2)->nullable();
            $table->decimal('misc_devfee', 10, 2)->nullable();
            $table->decimal('misc_energyfee', 10, 2)->nullable();
            $table->decimal('misc_facimp', 10, 2)->nullable();
            $table->decimal('misc_guidfee', 10, 2)->nullable();
            $table->decimal('misc_ITfee', 10, 2)->nullable();
            $table->decimal('misc_inst', 10, 2)->nullable();
            $table->decimal('misc_medfee', 10, 2)->nullable();
            $table->decimal('misc_studIns', 10, 2)->nullable();
            $table->decimal('gradfee', 10, 2)->nullable();
            $table->decimal('retreatfee', 10, 2)->nullable();
            
        });

        DB::table('Fees')->insert(
            array(
                   'acadPeriod_id'   =>   '0',
                   'unitsFee'   =>   '1000.00',
                   'regFee'   =>   '1000.00',
                   'misc_dcb'   =>   '1000.00',
                   'misc_devfee'   =>   '1000.00',
                   'misc_energyfee'   =>   '1000.00',
                   'misc_facimp'   =>   '1000.00',
                   'misc_guidfee'   =>   '1000.00',
                   'misc_ITfee'   =>   '1000.00',
                   'misc_inst'   =>   '1000.00',
                   'misc_medfee'   =>   '1000.00',
                   'misc_studIns'   =>   '1000.00',
                   'gradfee'    =>   '1000.00',
                   'retreatfee'   =>   '1000.00',
            )
        );
        DB::table('Fees')->insert(
            array(
                   'acadPeriod_id'   =>   '1',
                   'unitsFee'   =>   '1000.00',
                   'regFee'   =>   '1000.00',
                   'misc_dcb'   =>   '1000.00',
                   'misc_devfee'   =>   '1000.00',
                   'misc_energyfee'   =>   '1000.00',
                   'misc_facimp'   =>   '1000.00',
                   'misc_guidfee'   =>   '1000.00',
                   'misc_ITfee'   =>   '1000.00',
                   'misc_inst'   =>   '1000.00',
                   'misc_medfee'   =>   '1000.00',
                   'misc_studIns'   =>   '1000.00',
                   'gradfee'    =>   '1000.00',
                   'retreatfee'   =>   '1000.00',
            )
        );
        DB::table('Fees')->insert(
            array(
                   'acadPeriod_id'   =>   '2',
                   'unitsFee'   =>   '1000.00',
                   'regFee'   =>   '1000.00',
                   'misc_dcb'   =>   '1000.00',
                   'misc_devfee'   =>   '1000.00',
                   'misc_energyfee'   =>   '1000.00',
                   'misc_facimp'   =>   '1000.00',
                   'misc_guidfee'   =>   '1000.00',
                   'misc_ITfee'   =>   '1000.00',
                   'misc_inst'   =>   '1000.00',
                   'misc_medfee'   =>   '1000.00',
                   'misc_studIns'   =>   '1000.00',
                   'gradfee'    =>   '1000.00',
                   'retreatfee'   =>   '1000.00',
            )
        );
        DB::table('Fees')->insert(
            array(
                   'acadPeriod_id'   =>   '3',
                   'unitsFee'   =>   '1000.00',
                   'regFee'   =>   '1000.00',
                   'misc_dcb'   =>   '1000.00',
                   'misc_devfee'   =>   '1000.00',
                   'misc_energyfee'   =>   '1000.00',
                   'misc_facimp'   =>   '1000.00',
                   'misc_guidfee'   =>   '1000.00',
                   'misc_ITfee'   =>   '1000.00',
                   'misc_inst'   =>   '1000.00',
                   'misc_medfee'   =>   '1000.00',
                   'misc_studIns'   =>   '1000.00',
                   'gradfee'    =>   '1000.00',
                   'retreatfee'   =>   '1000.00',
            )
        );
        DB::table('Fees')->insert(
            array(
                   'acadPeriod_id'   =>   '4',
                   'unitsFee'   =>   '1000.00',
                   'regFee'   =>   '1000.00',
                   'misc_dcb'   =>   '1000.00',
                   'misc_devfee'   =>   '1000.00',
                   'misc_energyfee'   =>   '1000.00',
                   'misc_facimp'   =>   '1000.00',
                   'misc_guidfee'   =>   '1000.00',
                   'misc_ITfee'   =>   '1000.00',
                   'misc_inst'   =>   '1000.00',
                   'misc_medfee'   =>   '1000.00',
                   'misc_studIns'   =>   '1000.00',
                   'gradfee'    =>   '1000.00',
                   'retreatfee'   =>   '1000.00',
            )
        );
        DB::table('Fees')->insert(
            array(
                   'acadPeriod_id'   =>   '5',
                   'unitsFee'   =>   '1000.00',
                   'regFee'   =>   '1000.00',
                   'misc_dcb'   =>   '1000.00',
                   'misc_devfee'   =>   '1000.00',
                   'misc_energyfee'   =>   '1000.00',
                   'misc_facimp'   =>   '1000.00',
                   'misc_guidfee'   =>   '1000.00',
                   'misc_ITfee'   =>   '1000.00',
                   'misc_inst'   =>   '1000.00',
                   'misc_medfee'   =>   '1000.00',
                   'misc_studIns'   =>   '1000.00',
                   'gradfee'    =>   '1000.00',
                   'retreatfee'   =>   '1000.00',
            )
        );
        DB::table('Fees')->insert(
            array(
                   'acadPeriod_id'   =>   '6',
                   'unitsFee'   =>   '1000.00',
                   'regFee'   =>   '1000.00',
                   'misc_dcb'   =>   '1000.00',
                   'misc_devfee'   =>   '1000.00',
                   'misc_energyfee'   =>   '1000.00',
                   'misc_facimp'   =>   '1000.00',
                   'misc_guidfee'   =>   '1000.00',
                   'misc_ITfee'   =>   '1000.00',
                   'misc_inst'   =>   '1000.00',
                   'misc_medfee'   =>   '1000.00',
                   'misc_studIns'   =>   '1000.00',
                   'gradfee'    =>   '1000.00',
                   'retreatfee'   =>   '1000.00',
            )
        );
        DB::table('Fees')->insert(
            array(
                   'acadPeriod_id'   =>   '7',
                   'unitsFee'   =>   '1000.00',
                   'regFee'   =>   '1000.00',
                   'misc_dcb'   =>   '1000.00',
                   'misc_devfee'   =>   '1000.00',
                   'misc_energyfee'   =>   '1000.00',
                   'misc_facimp'   =>   '1000.00',
                   'misc_guidfee'   =>   '1000.00',
                   'misc_ITfee'   =>   '1000.00',
                   'misc_inst'   =>   '1000.00',
                   'misc_medfee'   =>   '1000.00',
                   'misc_studIns'   =>   '1000.00',
                   'gradfee'    =>   '1000.00',
                   'retreatfee'   =>   '1000.00',
            )
        );
        DB::table('Fees')->insert(
            array(
                   'acadPeriod_id'   =>   '8',
                   'unitsFee'   =>   '1000.00',
                   'regFee'   =>   '1000.00',
                   'misc_dcb'   =>   '1000.00',
                   'misc_devfee'   =>   '1000.00',
                   'misc_energyfee'   =>   '1000.00',
                   'misc_facimp'   =>   '1000.00',
                   'misc_guidfee'   =>   '1000.00',
                   'misc_ITfee'   =>   '1000.00',
                   'misc_inst'   =>   '1000.00',
                   'misc_medfee'   =>   '1000.00',
                   'misc_studIns'   =>   '1000.00',
                   'gradfee'    =>   '1000.00',
                   'retreatfee'   =>   '1000.00',
            )
        );
        DB::table('Fees')->insert(
            array(
                   'acadPeriod_id'   =>   '9',
                   'unitsFee'   =>   '1000.00',
                   'regFee'   =>   '1000.00',
                   'misc_dcb'   =>   '1000.00',
                   'misc_devfee'   =>   '1000.00',
                   'misc_energyfee'   =>   '1000.00',
                   'misc_facimp'   =>   '1000.00',
                   'misc_guidfee'   =>   '1000.00',
                   'misc_ITfee'   =>   '1000.00',
                   'misc_inst'   =>   '1000.00',
                   'misc_medfee'   =>   '1000.00',
                   'misc_studIns'   =>   '1000.00',
                   'gradfee'    =>   '1000.00',
                   'retreatfee'   =>   '1000.00',
            )
        );
        DB::table('Fees')->insert(
            array(
                   'acadPeriod_id'   =>   '10',
                   'unitsFee'   =>   '1000.00',
                   'regFee'   =>   '1000.00',
                   'misc_dcb'   =>   '1000.00',
                   'misc_devfee'   =>   '1000.00',
                   'misc_energyfee'   =>   '1000.00',
                   'misc_facimp'   =>   '1000.00',
                   'misc_guidfee'   =>   '1000.00',
                   'misc_ITfee'   =>   '1000.00',
                   'misc_inst'   =>   '1000.00',
                   'misc_medfee'   =>   '1000.00',
                   'misc_studIns'   =>   '1000.00',
                   'gradfee'    =>   '1000.00',
                   'retreatfee'   =>   '1000.00',
            )
        );
        DB::table('Fees')->insert(
            array(
                   'acadPeriod_id'   =>   '11',
                   'unitsFee'   =>   '1000.00',
                   'regFee'   =>   '1000.00',
                   'misc_dcb'   =>   '1000.00',
                   'misc_devfee'   =>   '1000.00',
                   'misc_energyfee'   =>   '1000.00',
                   'misc_facimp'   =>   '1000.00',
                   'misc_guidfee'   =>   '1000.00',
                   'misc_ITfee'   =>   '1000.00',
                   'misc_inst'   =>   '1000.00',
                   'misc_medfee'   =>   '1000.00',
                   'misc_studIns'   =>   '1000.00',
                   'gradfee'    =>   '1000.00',
                   'retreatfee'   =>   '1000.00',
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
        Schema::dropIfExists('Fees');

    }
}
