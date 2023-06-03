<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'first_name'=>[
                'required',
                'max:10'
            ],
            'last_name'=>[
                'required',
                'max:10'
            ],
            'username'=>[
                'required',
                'max:20'
            ],
            'email'=>['required','email','unique:users'],
            'password'=>['required','confirmed'],
            
            
        ];
    }
}
