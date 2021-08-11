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

    public function Course()
    {
        return $this->belongsTo(Course::class, 'subjCode');
    }

    public function CourseProgramme()
    {
        return $this->belongsToMany(CourseProgramme::class, 'subjCode');
    }
}
