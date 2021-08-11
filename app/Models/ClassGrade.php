<?php

namespace App\Models;

use Eloquent as Model;

class ClassGrade extends Model
{
    


    public $table = 'ClassGrade';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';






    public $fillable = [
        'prelimGrade',
        'midtermGrade',
        'prefinalsGrade',
        'isPass'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'prelimGrade' => 'float',
        'midtermGrade' => 'float',
        'prefinalsGrade' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'prelimGrade' => 'nullable|numeric',
        'midtermGrade' => 'nullable|numeric',
        'prefinalsGrade' => 'nullable|numeric'
    ];

    
}
