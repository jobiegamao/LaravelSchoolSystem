<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Person;
use App\Models\User;
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

            $table->foreignID('person_id')
                ->contstrained('Person')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        //sample accounts

        // super admin 
        // JMGomez@seu.edu.ph
        // pass: 10001

        // registrar 
        // kngray@seu.edu.ph
        // pass: 10002

        // teacher 
        // kajones@seu.edu.ph
        // pass: 10003

        // student
        // cksmith@seu.edu.ph
        // pass: 10009

        // student
        // aaano@seu.edu.ph
        // pass: 10010
        
        $person = Person::all();
        
        foreach($person as $person){
            DB::table('users')->insert(
                array(
                    'person_id' => $person->id,
                    'name' => $person->fname . " " . $person->lname,
                    'email' => $person->fname[0] . $person->mname[0] . $person->lname  .'@seu.edu.ph',
                    'role' => $person->role,
                    'password' => Hash::make($person->id),
                    'created_at' => now()
        
                ));
            $user = User::all();
            
        }
        
        

        

        

        
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
