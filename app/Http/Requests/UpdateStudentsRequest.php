<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Students;
use App\Models\Student_Courses; //to add its rules here (merge)

class UpdateStudentsRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules_StudentModel = Students::$rules;
        $rules_Student_CoursesModel = Student_Courses::$rules;
        
        return array_merge($rules_StudentModel,$rules_Student_CoursesModel);
    }
}
