<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('role')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();

            $table->string('dp')->default('default.jpeg');
        });


        // super admin account

        DB::table('users')->insert(
        array(
            'name' => 'Super Admin',
            'email' => 'admin@yahoo.com',
            'role' => 'Admin',
            'password' => Hash::make('12345678'),
            'created_at' => now()

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
        Schema::dropIfExists('users');
    }
}
