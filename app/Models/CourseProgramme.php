<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class CourseProgramme
 * @package App\Models
 * @version August 1, 2021, 8:32 pm UTC
 *
 * @property integer $course_id
 * @property integer $programme_id
 * @property boolean $isProfessional
 */
class CourseProgramme extends Model
{
   


    public $table = 'CourseProgramme';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';






    public $fillable = [
        'subjCode',
        'progCode',
        'programme_id',
        'isProfessional'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
       
        'isProfessional' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
       
        'isProfessional' => 'nullable|boolean'
    ];

    public function Programme()
    {
        return $this->belongsTo(Programme::class, 'progCode');
    }

    public function Course()
    {
        return $this->belongsTo(Course::class, 'subjCode');
    }

    public function CourseProgrammePrereq()
    {
        return $this->hasMany(CourseProgrammePrereq::class, 'course_programme_id');
    }
}
