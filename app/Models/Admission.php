<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $table = 'admission_forms';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'school', 'entrance_exam_grade','course_choice','accepted_status'];

        
        public function registrationControlNO() {
            return $this->hasOne(RegisterAdmission::class, 'admission_id'); // model, fk, owner-key
            
        }

        public function enrolledStudent() {
            return $this->hasOneThrough(
                Students::class, //table connected through reg_admi
                RegisterAdmission::class, //connected table
                'admission_id', //fk  of 2nd class
                'register_admission_id', //fk of 1st class
            ); 
            
        }
}


