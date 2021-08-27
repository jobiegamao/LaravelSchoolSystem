<?php

namespace App\Models;

use Eloquent as Model;

class StudentUpdate extends Model
{
    

    public $table = 'StudentUpdate';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'student_id',
        'acadPeriod_id',
        'fees_id',
        'units',
        'unitsTook',
        'isGrad'
    ];



    public function Student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function Fees()
    {
        return $this->belongsTo(Fees::class, 'fees_id');
    }

    public function AcadPeriod()
    {
        return $this->belongsTo(AcadPeriod::class, 'acadPeriod_id');
    }
}
