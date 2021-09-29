<?php

namespace App\Models;

use Eloquent as Model;
use Carbon\Carbon;

class Person extends Model
{
    


    public $table = 'Person';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'lname',
        'fname',
        'mname',
        'birthdate',
        'sex',
        'email',
        'contactNo',
        'emergencyContactName',
        'emergencyContactNo',
        'address',
        'passsword',
        'role'
    ];


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'lname' => 'nullable|string|max:191',
        'fname' => 'nullable|string|max:191',
        'mname' => 'nullable|string|max:191',
        'sname' => 'nullable|string|max:191',
        'birthdate' => 'nullable',
        'sex' => 'nullable|string|max:191',
        'email' => 'nullable|string|max:191',
        'contactNo' => 'nullable|integer',
        'emergencyContactName' => 'nullable|string|max:191',
        'emergencyContactNo' => 'nullable|integer',
        'address' => 'nullable|string|max:191',
        'passsword' => 'nullable|string|max:191',
        'role' => 'nullable|string|max:191'
    ];


    public function age()
    {
        return Carbon::parse($this->birthdate)->age;
    }

    public function full_name()
    {
       
        return $this->lname . ', ' . $this->fname .' '. $this->mname .' '. $this->sname;
    }

    public function Student()
    {
        return $this->hasOne(Student::class, 'person_id');
    }

    public function Teacher()
    {
        return $this->hasOne(Teacher::class, 'person_id');
    }

    public function Payments()
    {
        return $this->hasMany(Payments::class, 'person_id');
    }

    public function PaymentLatest()
    {
        return $this->hasOne(Payments::class, 'person_id')->latestOfMany('id');
    }

    
}
