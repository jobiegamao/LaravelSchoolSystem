<?php

namespace App\Models;

use Eloquent as Model;




class AcadPeriod extends Model
{
 


    public $table = 'AcadPeriod';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


  



    public $fillable = [
        'acadSem',
        'acadYear'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'acadSem' => 'integer',
        'acadYear' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'acadSem' => 'required',
        'acadYear' => 'required'
    ];

    
}
