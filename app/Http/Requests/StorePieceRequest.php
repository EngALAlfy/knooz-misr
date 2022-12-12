<?php

namespace App\Http\Requests;

use App\Models\Piece;
use Illuminate\Foundation\Http\FormRequest;

class StorePieceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create' , Piece::class);
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
            'cut_date' => 'required',
            //'ship_date' => 'nullable',
            'length' => 'required',
            'width' => 'required',
            'thickness' => 'required',
            'status' => 'required',
            //'position' => 'required',
            'machine_id' => 'required',
            //'finish_type' => 'required',
            'count' => 'required|min:1',
            ];
    }
}
