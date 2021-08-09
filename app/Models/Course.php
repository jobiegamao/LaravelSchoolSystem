<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Course
 * @package App\Models
 * @version August 1, 2021, 8:33 pm UTC
 *
 * @property string $subjCode
 * @property string $subjName
 */
class Course extends Model
{
    


    public $table = 'Course';

     // if your key name is not 'id'
    // you can also set this to null if you don't have a primary key

    protected $primaryKey = 'subjCode';
    public $incrementing = false;
    protected $keyType = 'string';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'subjCode',
        'subjName',
        'units'
    ];

    

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'subjCode' => 'required|string|max:191',
        'subjName' => 'required|string|max:191'
    ];

    public function CourseProgramme()
    {
        return $this->hasMany(CourseProgramme::class, 'subjCode');
    }
    
}
