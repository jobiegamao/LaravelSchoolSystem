<?php

namespace App\Models;

use Eloquent as Model;



class Payments extends Model
{


    public $table = 'Payments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'person_id',
        'acadPeriod_id',
        'amount',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'person_id' => 'integer',
        'acadPeriod_id' => 'integer',
        'amount' => 'float',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'person_id' => 'required',
        'acadPeriod_id' => 'required',
        'amount' => 'nullable|numeric',
        'description' => 'nullable|string'
    ];


    public function AcadPeriod()
    {
        return $this->belongsTo(AcadPeriod::class, 'acadPeriod_id');
    }

    public function Person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
    

    
}
