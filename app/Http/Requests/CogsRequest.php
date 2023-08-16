<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CogsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sale_product_id' => 'required',
            'fabric_cost' => 'required|integer',
            'labor_cost'=>"required|integer",
            'transportation_cost ' => 'required|integer',
            'other_overhead_cost ' => 'required|integer',
            'quantity'=>"required|integer",
           
           
        ];
    }
    public function messages()
    {
        return [
            'sale_product_id.required' => 'Sale Product is required',
            'fabric_cost.required' => 'Fabric Cost is required',
            'labor_cost.required' => 'Loabor Cost is required',
            'transportation_cost.required' => 'Transportation Cost is required',
            'other_overhead_cost.required' => 'Overhead Cost is required',
            'quantity.required'=>'Quantity Cost is required',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => true,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }

}
