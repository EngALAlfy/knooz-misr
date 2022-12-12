<?php

namespace App\Http\Requests;

use App\Models\ShipPolicy;
use Illuminate\Foundation\Http\FormRequest;

class StoreShipPolicyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create' , ShipPolicy::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'number' => 'required|unique:ship_policies,number',
            'driver_name' => 'required',
            'car_number' => 'required|numeric',
            'ship_date' => 'required|date',
        ];
    }
}
