<?php

namespace App\Models;

use Eloquent as Model;



class StudentClass extends Model
{
    


    public $table = 'StudentClass';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    



    public $fillable = [
        'semester',
        'year',
        'student_id',
        'classOffering_id',
        'classGrade_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'semester' => 'integer',
        'year' => 'integer',
        'student_id' => 'integer',
        'classOffering_id' => 'integer',
        'classGrade_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'semester' => 'required',
        'year' => 'required',
        'student_id' => 'required',
        'classOffering_id' => 'nullable',
        'classGrade_id' => 'nullable'
    ];



    public function Student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function ClassOffering()
    {
        return $this->belongsTo(ClassOffering::class, 'classOffering_id');
    }

    public function ClassGrade()
    {
        return $this->hasOne(ClassGrade::class, 'classGrade_id');
    }
}
