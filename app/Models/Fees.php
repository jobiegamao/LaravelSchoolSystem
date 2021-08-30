<?php

namespace App\Models;

use Eloquent as Model;




class Fees extends Model
{
    


    public $table = 'Fees';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'year',
        'unitsFee',
        'regFee',
        'misc_dcb',
        'misc_devfee',
        'misc_energyfee',
        'misc_facimp',
        'misc_guidfee',
        'misc_ITfee',
        'misc_inst',
        'misc_medfee',
        'misc_studIns',
        'gradfee',
        'retreatfee',
        
    ];

    

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'nullable',
        'unitsFee' => 'nullable|float',
        'regFee' => 'nullable|float',
        'misc_dcb' => 'nullable|float',
        'misc_devfee' => 'nullable|float',
        'misc_energyfee' => 'nullable|float',
        'misc_facimp' => 'nullable|float',
        'misc_guidfee' => 'nullable|float',
        'misc_ITfee' => 'nullable|float',
        'misc_inst' => 'nullable|float',
        'misc_medfee' => 'nullable|float',
        'misc_studIns' => 'nullable|float'
    ];

    public function totalMisc(){
        $total = $this->misc_dcb + $this->misc_devfee + $this->misc_energyfee + $this->misc_facimp + $this->misc_guidfee
        + $this->misc_ITfee + $this->misc_inst + $this->misc_medfee + $this->misc_studIns + $this->regFee;

        return round($total,2);
    }

    public function totalGradFee(){
        $total = $this->gradfee + $this->retreatfee;

        return round($total,2);
    }
    
}
