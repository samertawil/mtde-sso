<?php

namespace mtde\sso\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
         return [
         'idc'=>[ 'required','numeric', 'min_digits:9', 'max_digits:9'],
         'old_password'=>[ 'required'],
         'password'=>[ 'required','min:4', 'confirmed','string'],
         'password_confirmation'=>[ 'required',],
         
        ];

    }
     
}
