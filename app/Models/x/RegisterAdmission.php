<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class RegisterAdmission
 * @package App\Models
 * @version July 23, 2021, 8:37 am UTC
 *
 */
class RegisterAdmission extends Model
{
    


    public $table = 'register_admission';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'admission_id',
        'registration_status',
        'course_1',
        'course_2',
        'acad_year',
        'acad_sem'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function admission() {
        return $this->belongsTo(Admission::class); // model, fk, owner-key
        
    }
    
    public function course1Name() {
        return $this->belongsTo(Courses::class, 'course_1'); // model, fk, owner-key
        
    }

    public function course2Name() {
        return $this->belongsTo(Courses::class, 'course_2'); // model, fk, owner-key
        
    }

    public function enrollment() {
        return $this->hasOne(Students::class, 'register_admission_id'); // model, fk, owner-key
        
    }


}
