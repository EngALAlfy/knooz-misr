<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create' , Employee::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:4|max:100',
            'job'=>'required|min:2|max:100',
            'code'=>'required|unique:employees,code|min:2|max:100',
            'employee_line_id'=>'required',
            'phone'=>'nullable|min:11|max:11',
        ];
    }
}
