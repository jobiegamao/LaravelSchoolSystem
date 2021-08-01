<?php

namespace App\Models;

use Eloquent as Model;

class Student extends Model
{
   
    public $table = 'Student';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    //add attributes
    protected $fillable = [
        'person_id',
        'year',
        'section',
        'isEnrolled',
        'isPass',
        'isNew'
    ];

    

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function full_name()
    {
        return $this->person->full_name();
    }

     /**
     * Get the student's enrolled IDs
     */
    public function enrolledProgramme()
    {
        return $this->hasMany(EnrollProgramme::class, 'student_id');
    }

 
    
    /**
     * Get the user's most recent program enrollment
     * not yet working
     */
    public function latestEnrollment()
    {
        return $this->morphOne(EnrollProgramme::class)->latestOfMany();
    }

   
}
