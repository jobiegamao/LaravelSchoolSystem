<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class PersonDetails
 * @package App\Models
 * @version July 25, 2021, 7:52 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $admissionForms
 * @property string $fname
 * @property string $lname
 * @property string $mname
 * @property string $sname
 * @property string $birthdate
 */
class PersonDetails extends Model
{
    


    public $table = 'person_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    



    public $fillable = [
        'fname',
        'lname',
        'mname',
        'sname',
        'birthdate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fname' => 'string',
        'lname' => 'string',
        'mname' => 'string',
        'sname' => 'string',
        'birthdate' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'fname' => 'nullable|string|max:191',
        'lname' => 'nullable|string|max:191',
        'mname' => 'nullable|string|max:191',
        'sname' => 'nullable|string|max:191',
        'birthdate' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function admissionForms()
    {
        return $this->hasMany(\App\Models\AdmissionForm::class, 'person_details_id');
    }
}
