<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Classrooms
 * @package App\Models
 * @version July 11, 2021, 11:41 am UTC
 *
 * @property string $classroom_name
 * @property string $classroom_code
 * @property boolean $classroom_status
 */
class Classrooms extends Model
{


    public $table = 'classrooms';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'classroom_name',
        'classroom_code',
        'classroom_status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'classroom_name' => 'string',
        'classroom_code' => 'string',
        'classroom_status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'classroom_name' => 'required|string|max:191',
        'classroom_code' => 'required|string|max:191',
        'classroom_status' => 'required|boolean'
    ];

    
}
