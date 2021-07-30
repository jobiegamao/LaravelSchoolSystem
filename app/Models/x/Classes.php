<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Classes
 * @package App\Models
 * @version July 11, 2021, 10:04 am UTC
 *
 * @property string $class_name
 * @property string $class_code
 */
class Classes extends Model
{


    public $table = 'classes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'class_name',
        'class_code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'class_name' => 'string',
        'class_code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'class_name' => 'required|string|max:191',
        'class_code' => 'required|string|max:191'
    ];

    
}
