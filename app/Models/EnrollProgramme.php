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
        'programme_id'
    ];

    /**
     * The attributes that should be casted to native types.
     * ok lanf wala to
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        
        'programme_level' => 'string',
        'student_id' => 'integer',
        'programme_id' => 'integer'
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
        'programme_id' => 'required|exists:App\Models\Programme,id'
    ];

    public function programme()
    {
        return $this->belongsTo(Programme::class, 'programme_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    
}
