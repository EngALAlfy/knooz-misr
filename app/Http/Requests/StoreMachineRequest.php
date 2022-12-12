<?php

namespace App\Http\Requests;

use App\Models\Machine;
use Illuminate\Foundation\Http\FormRequest;

class StoreMachineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create' , Machine::class);
        }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'job' => 'required|max:20',
            'input_type' => 'required',
            'output_type' => 'required',
            'number' => 'required',
        ];
    }
}
