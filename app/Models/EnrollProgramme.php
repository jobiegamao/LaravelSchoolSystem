<?php

namespace App\Models;

use Eloquent as Model;




class EnrollProgramme extends Model
{
   


    public $table = 'EnrollProgramme';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    


    public $fillable = [
        'description',
        'student_id',
        'progCode',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     * ok lanf wala to
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        
    
        'student_id' => 'integer',
        'progCode' => 'string',
    ];

    /**
     * Validation rules
     * update rules here
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'description' => 'required',
        'student_id' => 'required|exists:App\Models\Student,id',
        'progCode' => 'required|exists:App\Models\Programme,progCode',
    ];

    public function Programme()
    {
        return $this->belongsTo(Programme::class, 'progCode');
    }

    public function Student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function CourseProgramme()
    {
        return $this->hasMany(CourseProgramme::class, 'progCode', 'progCode');
    }

    
}
