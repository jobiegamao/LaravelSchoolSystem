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
        'labfee',
    ];

    

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'nullable',
        'unitsFee' => 'nullable|numeric',
        'regFee' => 'nullable|numeric',
        'misc_dcb' => 'nullable|numeric',
        'misc_devfee' => 'nullable|numeric',
        'misc_energyfee' => 'nullable|numeric',
        'misc_facimp' => 'nullable|numeric',
        'misc_guidfee' => 'nullable|numeric',
        'misc_ITfee' => 'nullable|numeric',
        'misc_inst' => 'nullable|numeric',
        'misc_medfee' => 'nullable|numeric',
        'misc_studIns' => 'nullable|numeric'
    ];

    public function totalMisc(){
        $total = $this->misc_dcb + $this->misc_devfee + $this->misc_energyfee + $this->misc_facimp + $this->misc_guidfee
        + $this->misc_ITfee + $this->misc_inst + $this->misc_medfee + $this->misc_studIns + $this->regFee;

        return round($total,2);
    }
    
}
