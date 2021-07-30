<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Programme', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('code')->nullable();

            //select if the program is for undergrad, grad, post
            $table->string('level')->nullable();
        });

        DB::table('Programme')->insert(
            array(
                   'name'   =>   'BS in Computer Science',
                   'level'   =>   'Undergraduate',
            )
        );

        DB::table('Programme')->insert(
            array(
                   'name'   =>   'BS in Psychology',
                   'level'   =>   'Undergraduate',
            )
        );

        DB::table('Programme')->insert(
            array(
                   'name'   =>   'AB in Philosophy',
                   'level'   =>   'Undergraduate',
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
        Schema::dropIfExists('Programme');
    }
}
