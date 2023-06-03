<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SigninRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            "email"=>['required','email',Rule::exists('users')],
            "password"=>['required'],
        ];
    }
    public function messsages()
    {
        return [
            "email.exists"=>'The Email dosn\'t match Our records',
            

        ];
    }
}
