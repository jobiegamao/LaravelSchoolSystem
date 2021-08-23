<?php

namespace App\Models;

use Eloquent as Model;




class AcadPeriod extends Model
{
    


    public $table = 'AcadPeriod';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'acadSem',
        'acadYear'
    ];

    

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'acadSem' => 'required|unique_with:AcadPeriod,acadYear',
        'acadYear' => 'required'
    ];


    public function acadSemText(){
        
        switch($this->acadSem){
            
            case '0':
                $text = "Summer";
                break;

            case '1':
                $text = "1st Semester";
                break;
            
            default:
                $text = "2nd Semester";
                break;
        }

        return $text;
        
    }

    public function Payments()
    {
        return $this->hasMany(Payments::class, 'acadPeriod_id');
    }



    
}
