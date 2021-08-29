<?php

namespace App\Models;

use Eloquent as Model;

class ClassGrade extends Model
{

    public $table = 'ClassGrade';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'prelimGrade',
        'midtermGrade',
        'prefinalsGrade',
        'isPass'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'prelimGrade' => 'float',
        'midtermGrade' => 'float',
        'prefinalsGrade' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'prelimGrade' => 'nullable|numeric',
        'midtermGrade' => 'nullable|numeric',
        'prefinalsGrade' => 'nullable|numeric'
    ];

   

    public function finalGradeText()
    {
        $grade = round( (($this->prelimGrade + $this->midtermGrade + $this->prefinalsGrade)/3) , 2);
        if($grade < 75){
             return "<strong style='color:red'>{$grade}</strong>";
        }else{
            return "<p style='color:green'>{$grade}</p>";
        }
       
    }

    public function finalGrade()
    {
        $grade = round( (($this->prelimGrade + $this->midtermGrade + $this->prefinalsGrade)/3) , 2);
        return $grade;
       
    }

    public function finalGradeQPI()
    {
        $n = $this->finalGrade();
        
        if($n == 0){
            return 0;
        }
        switch($n){                            
            case ($n >= 92):
                $e = 4.0;
                break;
            case ($n >= 87):
                $e = 3.5;
                break;
            case ($n >= 80):
                $e = 3.0;
                break;
            case ($n >= 75):
                $e = 2.5;
                break;
            case ($n >= 68):
                $e = 2.0;
                break;
            case ($n >= 60):
                $e = 1.0;
                break;
            default:
                $e = 0.0;
                break;  
        }
        return $e;
       
    }

    
}
