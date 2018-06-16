<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255|email',
            'password' => 'required|max:255|same:repassword',
            'repassword' => 'required|max:255',
            'rule' => 'required',
            'mobile' => 'required|unique:users|max:255',
            'address' => 'required|max:255',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is Required',
            'name.max' => 'Name Max Length 190 Required',
            'email.required' => 'Email is Required',
            'email.unique' => 'Email Already Exits',
            'email.email' => 'Email is Not valid',
            'email.max' => 'A message is Required',
            'password.required' => 'Password is Required',
            'password.same' => 'Password not match',
            'repassword.required' => 'Re-Password is Required',
            'mobile.required' => 'Phone is Required',
            'mobile.unique' => 'Phone Already Exits',
            'address.required' => 'Address is Required',
            'status.required' => 'status is Required',
        ];
    }
}
