<?php

namespace App\Models;

use Eloquent as Model;




class ClassOffering extends Model
{
   


    public $table = 'ClassOffering';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    



    public $fillable = [
        'subjCode',
        'classCode',
        'schedule',
        'teacher_id',
        'room',
        'semester',
        'year'
    ];

   

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'subjCode' => 'required|string|max:191',
        'classCode' => 'required|string|max:191',
        'schedule' => 'nullable',
        'teacher_id' => 'nullable',
        'room' => 'nullable',
       
        
    ];

    public function StudentClass()
    {
        return $this->hasMany(StudentClass::class, 'classOffering_id');
    }

    public function StudentCount()
    {
        return $this->StudentClass()->count();
    }


    public function Course()
    {
        return $this->belongsTo(Course::class, 'subjCode', 'subjCode');
    }

    public function CourseProgramme()
    {
        return $this->belongsToMany(CourseProgramme::class, 'subjCode');
    }

    public function Teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function GradeReports()
    {
        return $this->hasOne(GradeReports::class, 'classOffering_id');
    }

}
