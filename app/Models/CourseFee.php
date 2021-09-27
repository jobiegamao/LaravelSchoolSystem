<?php

namespace App\Models;

use Eloquent as Model;


class CourseFee extends Model
{


    public $table = 'CourseFee';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    

    public $fillable = [
        'subjCode',
        'labFee',
        'acadPeriod_id'
    ];

  
   
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'subjCode' => 'unique_with:CourseFee,acadPeriod_id|required',
        'labFee' => 'required|numeric',
        'acadPeriod_id' => 'required'
    ];

    public function Course()
    {
        return $this->belongsTo(Course::class, 'subjCode', 'subjCode'); // fk, parent pk
    }
}
