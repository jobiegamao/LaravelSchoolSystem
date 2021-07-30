<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class EnrolPayLog
 * @package App\Models
 * @version July 25, 2021, 10:03 pm UTC
 *
 */
class EnrolPayLog extends Model
{


    public $table = 'enrol_pay_log';
    





    public $fillable = [
        'register_admission_id',
        'enrollment_fee',
        'description',
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
