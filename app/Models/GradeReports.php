<?php

namespace App\Models;

use Eloquent as Model;




class GradeReports extends Model
{
   


    public $table = 'GradeReports';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'classOffering_id'
    ];


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'classOffering_id' => 'required'
    ];

    
}
