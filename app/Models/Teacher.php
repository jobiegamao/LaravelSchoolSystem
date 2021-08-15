<?php

namespace App\Models;

use Eloquent as Model;




class Teacher extends Model
{
    

    public $table = 'Teachers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


 



    public $fillable = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function Person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function full_name()
    {
        return $this->person->full_name();
    }

    public function ClassOffering()
    {
        return $this->hasMany(ClassOffering::class, 'teacher_id');
    }

    
}
