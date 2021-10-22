<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class CourseProgramme extends Model
{
   


    public $table = 'CourseProgramme';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';






    public $fillable = [
        'subjCode',
        'progCode',
        'programme_id',
        'isProfessional',
        'acadPeriod'
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
        return $this->belongsTo(Course::class, 'subjCode', 'subjCode'); // fk, parent pk
    }

    public function CourseProgrammePrereq()
    {
        return $this->hasMany(CourseProgrammePrereq::class, 'course_programme_id');
    }

    public function EnrollProgramme()
    {
        return $this->belongsTo(EnrollProgramme::class, 'progCode', 'progCode');
    }
   
    public function AcadPeriod()
    {
        return $this->belongsTo(AcadPeriod::class, 'acadPeriod');
    }
}
