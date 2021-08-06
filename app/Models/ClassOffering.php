<?php

namespace App\Models;

use Eloquent as Model;




class ClassOffering extends Model
{
   


    public $table = 'ClassOffering';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    



    public $fillable = [
        'subjCode',
        'classCode',
        'schedule',
        'teacher_id',
        'room',
        'semester',
        'year'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
  

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'subjCode' => 'required|string|max:191',
        'classCode' => 'required|string|max:191',
        'schedule' => 'required|string|max:191',
        'teacher_id' => 'nullable',
        'room' => 'required|string|max:191',
       
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function Course()
    {
        return $this->belongsTo(\App\Models\Course::class, 'subjCode');
    }
}
