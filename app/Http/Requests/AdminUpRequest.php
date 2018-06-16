<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpRequest extends FormRequest
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
            'name'      => 'required|max:255',    
            'rule'      => 'required', 
            'mobile'    => 'required|max:255', 
            'address'   => 'required|max:255',  
            'status'    => 'required'
        ];
    }
    
    public function messages()
    {
        return [
            'name.required'     => 'Name is Required',
            'name.max'          => 'Name Max Length 190 Required', 
            'mobile.required'   => 'Phone is Required',  
            'address.required'  => 'Address is Required',  
            'status.required'   => 'status is Required', 
        ];
    }
}
