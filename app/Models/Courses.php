<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Courses
 * @package App\Models
 * @version July 20, 2021, 6:28 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $studentCourses
 * @property string $course_name
 * @property string $course_code
 * @property string $description
 * @property boolean $status
 */
class Courses extends Model
{
    //use SoftDeletes;


    public $table = 'courses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    //protected $dates = ['deleted_at'];



    public $fillable = [
        'course_name',
        'course_code',
        'description',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'course_name' => 'string',
        'course_code' => 'string',
        'description' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'course_name' => 'required|string|max:191',
        'course_code' => 'required|string|max:191',
        'description' => 'nullable|string',
        'status' => 'required|boolean',
        //'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function studentCourses()
    {
        return $this->hasMany(\App\Models\StudentCourse::class, 'course_id');
    }
}
