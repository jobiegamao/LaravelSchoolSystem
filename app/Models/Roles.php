<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Roles
 * @package App\Models
 * @version July 11, 2021, 11:40 am UTC
 *
 * @property string $description
 * @property string $role_code
 */
class Roles extends Model
{


    public $table = 'roles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'description',
        'role_code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'description' => 'string',
        'role_code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required|string|max:191',
        'role_code' => 'required|string|max:191'
    ];

    
}
