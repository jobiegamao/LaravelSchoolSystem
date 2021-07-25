<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollPayLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enroll_pay_log', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('register_admission_id')->unsigned(); //(control id for new enrollment)
            $table->timestamps();

            $table->DECIMAL('money_worth', 8,2);
            $table->text('description')->nullable();

            $table->foreign('register_admission_id')
                ->references('id')
                ->on('register_admission')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enroll_pay_log');
    }
}
