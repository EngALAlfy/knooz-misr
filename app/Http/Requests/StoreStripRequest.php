<?php

namespace App\Http\Requests;

use App\Models\Strip;
use Illuminate\Foundation\Http\FormRequest;

class StoreStripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create' , Strip::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'block_id' => 'required',
        'cut_date' => 'nullable',
        'length' => 'required',
        'width' => 'required',
        'thickness' => 'required',
        'status' => 'required',
        'position' => 'required',
        'machine_id' => 'nullable',
        'finish_type' => 'required',
        'count' => 'required|min:1',
        ];
    }
}
