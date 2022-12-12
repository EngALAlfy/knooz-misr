<?php

namespace App\Http\Requests;

use App\Models\Block;
use Illuminate\Foundation\Http\FormRequest;

class StoreBlockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create' , Block::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'material_id' => 'required',

        'number' => 'required|unique:blocks',
        'recive_date' => 'required',
        'cut_date' => 'nullable',
        'length_before' => 'nullable',
        'width_before' => 'nullable',
        'height_before' => 'nullable',
        'length_after' => 'nullable',
        'width_after' => 'nullable',
        'height_after' => 'nullable',
        'status' => 'required',
        'position' => 'required',
        //'machine_id' => 'nullable',
        ];
    }
}
