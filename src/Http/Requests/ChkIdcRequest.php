<?php

namespace mtde\sso\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChkIdcRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
         return [
         'idc'=>[ 'required',],
         
        ];

    }
    public function messages()
    {
      return[
        'idc.exists'=>'رقم الهوية المدخل غير صحيح',
        'idc.unique'=> 'يوجد حساب لرقم الهوية المدخل',
       
      ];  
    } 
    

}
