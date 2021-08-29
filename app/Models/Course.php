<?php

namespace App\Models;

use Eloquent as Model;




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
        'units',
        'labFee'
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
        'subjName' => 'required|string|max:191',
        'labFee' => 'float'
    ];

    public function CourseProgramme()
    {
        return $this->hasMany(CourseProgramme::class, 'subjCode', 'subjCode');
    }

    public function ClassOffering()
    {
        return $this->hasMany(ClassOffering::class, 'subjCode', 'subjCode');
    }
    
}
