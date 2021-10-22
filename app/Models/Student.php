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
        'isNew',
        'unitsTook',
        'units'
    ];

    

    public function Person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function full_name()
    {
        return $this->Person->full_name();
    }

     /**
     * Get the student's enrolled IDs
     */
    public function EnrolledProgramme()
    {
        return $this->hasMany(EnrollProgramme::class, 'student_id');
    }

    public function StudentClass()
    {
        return $this->hasMany(StudentClass::class, 'student_id');
    }


    public function CourseProgramme()
    {
        return $this->hasManyThrough(
            CourseProgramme::class, 
            EnrollProgramme::class,  
            'student_id',
            'progCode',
            'id',
            'progCode'
        );
    }

    public function StudentUpdate()
    {
        return $this->hasMany(StudentUpdate::class, 'student_id');
    }
   

    public function StudentUpdateLatest()
    {
        return $this->hasOne(StudentUpdate::class, 'student_id')->latestOfMany('id');
    }

    public function StudentUpdateFirst()
    {
        return $this->hasOne(StudentUpdate::class, 'student_id')->oldest();
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
