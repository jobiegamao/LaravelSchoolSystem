<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Students
 * @package App\Models
 * @version July 20, 2021, 2:37 pm UTC
 *
 * @property \App\Models\AdmissionForm $admission
 * @property integer $admission_id
 */
class Students extends Model
{
   

    

    public $table = 'students';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'register_admission_id'
    ];

   

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    

    public function registration()
    {
        return $this->belongsTo(RegisterAdmission::class, 'register_admission_id');
    }


    //BelongsToMany pivot table student_courses
    public function courseEnrolled()
    {
        return $this->belongsToMany(Courses::class, 'student_courses','student_id','course_id');
        // related table, , pivot table, model's foreignKey in pivot, related foreignKey in pivot
    }


   




   
}
