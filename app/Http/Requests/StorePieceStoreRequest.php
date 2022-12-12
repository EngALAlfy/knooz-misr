<?php

namespace App\Http\Requests;

use App\Models\PieceStore;
use Illuminate\Foundation\Http\FormRequest;

class StorePieceStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create' , PieceStore::class);;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'block_id' => 'required',
            //'cut_date' => 'required',
            //'ship_date' => 'nullable',
            'length' => 'required',
            'width' => 'required',
            'thickness' => 'required',
            'status' => 'required',
            'position' => 'required',
            'material_id' => 'required',
            'finish_type' => 'required',
            'count' => 'required|min:1',
            ];
    }
}
