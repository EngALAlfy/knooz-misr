<?php

namespace App\Http\Requests;

use App\Models\EmployeeLine;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeLineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create' , EmployeeLine::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|unique:employee_lines,name|min:4|max:100',
        ];
    }
}
