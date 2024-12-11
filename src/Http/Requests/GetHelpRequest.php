<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TimeHunter\LaravelGoogleReCaptchaV2\Validations\GoogleReCaptchaV2ValidationRule;

class GetHelpRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {

        return [
            'created_by_idc' => ['required', 'numeric', 'digits_between:9,9'],
            'name' => ['required'],
            'mobile' => ['required', 'numeric', 'digits_between:10,10'],
            'subject' => ['required'],
            'issue_description' => ['required'],
            'gov_regions_id'=>['required'],
            // 'g-recaptcha-response' => [new GoogleReCaptchaV2ValidationRule()],
            'captcha' => ['required', 'captcha'],
           

        ];
    }

    public function messages()
    {
        return [
            'mobile.digits_between' => 'خطا برقم الجوال',
            'created_by_idc.digits_between' => 'خطأ برقم الهوية',
            'created_by_idc.numeric' => 'خطأ برقم الهوية',
            'subject.required' => 'طلب دعم فني بخصوص',
            'name.required' => 'اسم مقدم الطلب',
            'issue_description.required' => 'تفصيل الدعم الفني المطلوب',
            'created_by_idc.required' => 'رقم هوية مقدم الطلب',
            // 'g-recaptcha-response' => 'الرجاء الضغط على بطاقة التحقق',
            'captcha.captcha' => 'خطأ في كود التحقق ',

        ];
    }
}
