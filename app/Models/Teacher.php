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
