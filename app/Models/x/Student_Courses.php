<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Student_Courses
 * @package App\Models
 * @version July 20, 2021, 6:14 pm UTC
 *
 * @property \App\Models\Course $course
 * @property \App\Models\Student $student
 * @property integer $student_id
 * @property integer $course_id
 */
class Student_Courses extends Model
{
    //use SoftDeletes;


    public $table = 'student_courses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    //protected $dates = ['deleted_at'];



    public $fillable = [
        'student_id',
        'course_id',
        'acad_year',
        'acad_sem'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'student_id' => 'integer',
        'course_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'student_id' => 'required|exists:App\Models\Students,id',
        'course_id' => 'required|exists:App\Models\Courses,id',
        
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function course()
    {
        return $this->belongsTo(\App\Models\Course::class, 'course_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function student()
    {
        return $this->belongsTo(\App\Models\Student::class, 'student_id');
    }
}
