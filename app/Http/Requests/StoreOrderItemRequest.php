<?php

namespace App\Http\Requests;

use App\Models\OrderItem;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', OrderItem::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'order_id' => 'required',
            'material_id'=> 'required',
            'finish_type'=> 'required',
            'length'=> 'required',
            'width'=> 'required',
            'thickness'=> 'required',
            'count'=> 'required',
            'done_count'=> 'nullable',
            'shipped_count'=> 'nullable',
        ];
    }
}
