<?php

namespace mtde\sso\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
 
    public function authorize(): bool
    {
        return true;
    }

 
    public function rules(): array
    {
        return [
            'idc'=>['required','numeric','min_digits:9','max_digits:9'],
            'password'=>['required',],
        ];
    }
}
 