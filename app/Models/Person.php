<?php

namespace App\Models;

use Eloquent as Model;
use Carbon\Carbon;

class Person extends Model
{
    


    public $table = 'Person';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lname' => 'string',
        'fname' => 'string',
        'mname' => 'string',
        'birthdate' => 'date',
        'sex' => 'string',
        'email' => 'string',
        'contactNo' => 'integer',
        'emergencyContactName' => 'string',
        'emergencyContactNo' => 'integer',
        'address' => 'string',
        'passsword' => 'string',
        'role' => 'string'
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

    public function student()
    {
        return $this->hasOne(Student::class, 'person_id');
    }

    
}
