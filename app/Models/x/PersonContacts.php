<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class PersonContacts
 * @package App\Models
 * @version July 11, 2021, 8:30 am UTC
 *
 * @property \App\Models\Person $person
 * @property integer $person_id
 * @property string $contact_no
 * @property string $email
 * @property string $permanent_address
 * @property string $current_address
 * @property string $emergencyContactName
 * @property string $emergencyContactNo
 */
class PersonContacts extends Model
{


    public $table = 'person_contacts';
    
    const CREATED_AT = null;
    const UPDATED_AT = null;




    public $fillable = [
    
        'contact_no',
        'email',
        'permanent_address',
        'current_address',
        'emergencyContactName',
        'emergencyContactNo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contact_no' => 'string',
        'email' => 'string',
        'permanent_address' => 'string',
        'current_address' => 'string',
        'emergencyContactName' => 'string',
        'emergencyContactNo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'contact_no' => 'nullable|string|max:191',
        'email' => 'nullable|string|max:191',
        'permanent_address' => 'nullable|string',
        'current_address' => 'nullable|string',
        'emergencyContactName' => 'nullable|string|max:191',
        'emergencyContactNo' => 'nullable|string|max:191'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'person_id');
    }
}
