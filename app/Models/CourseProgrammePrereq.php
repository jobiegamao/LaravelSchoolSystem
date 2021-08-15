<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class CourseProgrammePrereq
 * @package App\Models
 * @version August 1, 2021, 8:32 pm UTC
 *
 * @property integer $course_programme_id
 * @property integer $prereq_course_programme_id
 */
class CourseProgrammePrereq extends Model
{



    public $table = 'CourseProgrammePrereq';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


  



    public $fillable = [
        'course_programme_id',
        'prereq_course_programme_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'course_programme_id' => 'integer',
        'prereq_course_programme_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'course_programme_id' => 'required',
        'prereq_course_programme_id' => 'required'
    ];

    public function CourseProgramme()
    {
        return $this->belongsTo(CourseProgramme::class, 'course_programme_id');
    }

    public function PrereqProg() //prereq subject details
    {
        return $this->belongsTo(CourseProgramme::class, 'prereq_course_programme_id', 'id');
    }
}
