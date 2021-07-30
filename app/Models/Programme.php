<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Programme
 * @package App\Models
 * @version July 29, 2021, 2:13 pm UTC
 *
 * @property string $name
 * @property string $code
 */
class Programme extends Model
{



    public $table = 'Programme';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


   



    public $fillable = [
        'name',
        'code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'name' => 'required|string|max:191',
        'code' => 'required|string|max:191'
    ];

    
}
