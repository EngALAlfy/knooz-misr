<?php

namespace App\Http\Requests;

use App\Models\ShipPolicy;
use App\Models\ShipPolicyRecord;
use Illuminate\Foundation\Http\FormRequest;

class StoreShipPolicyRecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
         return $this->user()->can('create' , ShipPolicyRecord::class);;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'length' => 'required',
            'width' => 'required',
            'thickness' => 'required',
            'material_id' => 'required',
            'finish_type' => 'required',
            'count' => 'required|min:1',
        ];
    }
}
