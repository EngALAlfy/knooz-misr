<?php

namespace App\Http\Requests;

use App\Models\EmployeeAttendance;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeAttendanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create' , EmployeeAttendance::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'employee_id'=>'required',
            'date'=>'required',
            'status'=>'required',
            'reason'=>'nullable|max:200',
            'note'=>'nullable|max:200',
        ];
    }
}
