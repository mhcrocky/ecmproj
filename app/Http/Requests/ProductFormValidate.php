<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormValidate extends FormRequest
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
            'name' 		=>	'required|max:255',
			'sku'		=>	'required',
			'brand_id'	=>	'required|not_in:0',
			'price'		=>	'required|regex:/^\d+(\.\d{1,2})?$/',
			'special_price'		=> 'regex:/^\d+(\.\d{1,2})?$/',
			'quantity'	=>	'required|numeric'
        ];
    }

    /**
     * Get Custom Validator message 
     * @return array
     */
    public function attributes(){
        \Log::info("Req=ProductForValidate@attributes called");
        return [
            
        ];
    }

    /**
     * Validator after action
     * @return void
     */
    public function withValidator($validator){
        \Log::info("Req=ProductFormValidate@withValidator called");
        
    }
}
