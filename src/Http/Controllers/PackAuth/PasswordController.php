<?php

namespace mtde\sso\Http\Controllers\PackAuth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use mtde\sso\Http\Requests\ChkIdcRequest;
use mtde\sso\Http\Requests\ForgetRequest;
use mtde\sso\Http\Requests\ChangePassRequest;

class PasswordController
{

    public function create()
    {
        return view('pack::pack-auth.change-password-form');
    }

    public function changePassword(ChangePassRequest $request)
    {

        $res = Http::post("https://sso.egaza.ps/api/changePassword/" . $request->idc, [

            'token' => 'YWZtxm6iQp7CPmVFwLAUMt2HefbaUHnXSVrKHoJk',
            'old_password' => $request->old_password,
            'new_password' => $request->password,

        ]);

        $data = $res->json();

        if ($res->successful() && $data['status'] == true) {

            return redirect()->route('login')->with('message', __('pack::pack.change_password_success'))->with('type', 'success');
            //nedd to logout to login in new password

        } elseif ($res->successful() && $data['status'] != true) {

            return redirect()->back()->with('message', $data['msg'])->with('type', 'danger');
        } else {

            return redirect()->back()->with('message', __('pack::pack.connection_faild, please try again later'))
                ->with('type', 'danger');
        }
    }

    public function forgetpassword_create()
    {

        return view('pack::pack-auth.forget-password-create');
    }


    public  function getPersonalData($idc)
    {



        $res = Http::post("https://sso.egaza.ps/api/forgetPasswordGetQuestions/" . $idc, [

            'token' => 'YWZtxm6iQp7CPmVFwLAUMt2HefbaUHnXSVrKHoJk',
        ]);

        if ($res->successful()) {

            $citizen = json_decode($res, true);

            if ($citizen['status'] == true) {

                session([
                    'idc' => $citizen['questions']['idc'],
                    'full_name' => $citizen['questions']['full_name'],
                    'q1' => $citizen['questions']['q1'],
                    'q2' => $citizen['questions']['q2']
                ]);
            } else {

                session([
                    'wrongMsg' => $citizen['msg'],
                ]);

                session()->forget('idc');
            }
        } else {

            $error = $res;

            return redirect()->route('register.create')->with('message', __('pack::pack.connection_faild, please try again later'))
                ->with('type', 'danger');
        }
    }



    public function forgetPassword_form(ChkIdcRequest $request)
    {


        $this->getPersonalData($request->idc);

        if (session('idc')) {
            $full_name = session('full_name');
            $idc = session('idc');
            $q1 = session('q1');
            $q2 = session('q2');
            return view('pack::pack-auth.forget-password-form',  compact('full_name', 'idc', 'q1', 'q2'));
        } else {

            $validator = Validator::make([], []);
            $validator->errors()->add('idc', session('wrongMsg'));
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    
    public function saveForgetPassword(ForgetRequest $request, $idc)
    {
      

         $birthdayDate = $request->year . '-' . $request->month . '-' . $request->day;


        $res = Http::post("https://sso.egaza.ps/api/saveForgetPassword/" . $idc, [

            'token' => 'YWZtxm6iQp7CPmVFwLAUMt2HefbaUHnXSVrKHoJk',
            'answer1' => $request->answer_q1,
            'answer2' => $request->answer_q2,
            'new_password' => $request->password,
          
             'birth_date' =>  $birthdayDate,
        ]);

        $data = $res->json();
        if ($res->successful() && $data['status'] == true) {

                  
           
            session([
                'auth_idc' =>$data['idc'],
                'auth_full_name'=>$data['full_name']
            ]);
            
               
         return redirect('/');

        } elseif ($res->successful() && $data['status'] != true) {

           
            $errors = json_decode($res, true);
                     
            return redirect()->back()->withErrors($errors['msg']);

            session_destroy();
        } else {

            return redirect()->back()->with('message', __('pack::pack.connection_faild, please try again later'))
                ->with('type', 'danger');
        }

           
            $errors = json_decode($res, true);

            return redirect()->back()->withErrors($errors['msg']);

            session_destroy();
    }
}
