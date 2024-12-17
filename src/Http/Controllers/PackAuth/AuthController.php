<?php

namespace mtde\sso\Http\Controllers\PackAuth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use mtde\sso\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Validator;
use mtde\sso\Http\Requests\ChkIdcRequest;
use mtde\sso\Http\Requests\RegisterRequest;

class  AuthController
{


    public static function isAuth()
    {

        if (session('auth_idc')) {
            return true;
        }
        return false;
    }

    public static function printAuthData()
    {

        if (self::isAuth()) {
            return  ['name' => session('auth_full_name'), 'idc' => session('auth_idc')];
        } else {
            return ['name' => null, 'idc' => null];
        }
    }

    public static  function setSessionData($data)
    {
        session([
            'auth_idc' => $data['idc'],
            'auth_full_name' => $data['full_name'],
        ]);
    }

    public static  function forgetSessionData()
    {
  
        session()->forget('auth_idc');
        session()->forget('auth_full_name');
    }

    public function showLoginForm()
    {

        if (! self::isAuth()) {
            return view('pack::pack-auth.login');
        } else {
            return redirect()->route(config('sso.redirectRoute'));
        }
    }

    public function login(LoginRequest $request)
    {

     
        $res =  Http::post("https://sso.egaza.ps/api/login", [
            'token' => config('sso.ssoToken'),
            'idc' => $request->idc,
            'password' => $request->password
        ]);

        $data = $res->json();

        if ($res->successful() && $data['status'] == true) {

            self::setSessionData($data);
           

            return  redirect()->route(config('sso.redirectRoute'));

        } elseif ($res->successful() && $data['status'] != true) {

            self::forgetSessionData();

            $validator = Validator::make([], []);
            $validator->errors()->add('idc', $data['msg']);
            return redirect()->back()->withErrors($validator)->withInput();

        } else {

            self::forgetSessionData();

            return redirect()->route('login')->with('message', __('pack::pack.connection_faild, please try again later'))
                ->with('type', 'danger');
        }
    }



    // register methods
    public static function getPersonalData($idc)
    {

        $res = Http::post("https://sso.egaza.ps/api/register/" . $idc, [

            'token' => config('sso.ssoToken'),
        ]);

        $data = $res->json();

        if ($res->successful() && $data['status'] == true) {

            return  $data = [
                'status' => 'success',
                'idc' => $data['questions']['idc'],
                'full_name' => $data['questions']['full_name'],
                'q1' => $data['questions']['q1'],
                'q2' => $data['questions']['q2']
            ];
        } elseif ($res->successful() && $data['status'] != true) {

            return  $data = [
                'status' => 'false',
                'wrongMsg' => $data['msg'],
            ];

        } else {

            return  $data = [
                'status' => 'fail conn',
            ];

            return redirect()->route('sso.register.create')->with('message', __('pack::pack.connection_faild, please try again later'))
                ->with('type', 'danger');
        }
    }

    public static function register_create()
    {

        return view('pack::pack-auth.register-create');
    }

    public static function register_form(ChkIdcRequest $request)
    {

        session()->forget('q1');
        session()->forget('q2');

        $x1 = self::getPersonalData($request->idc);

        if ($x1['status'] == 'success') {

            $full_name = $x1['full_name'];
            $idc       = $x1['idc'];
            $q1        = $x1['q1'];
            $q2        = $x1['q2'];

            session([
                'q1' =>  $q1,
                'q2' =>  $q2,
            ]);

            return view('pack::pack-auth.register',  compact('full_name', 'idc', 'q1', 'q2'));
        } elseif ($x1['status'] == 'false') {

            $validator = Validator::make([], []);
            $validator->errors()->add('idc', $x1['wrongMsg']);
            return redirect()->back()->withErrors($validator)->withInput();

        } elseif ($x1['status'] == 'fail conn') {

            return redirect()->route('sso.register.create')->with('message', __('pack::pack.connection_faild, please try again later'))
                ->with('type', 'danger');
        }
    }



    public function saveRegister(RegisterRequest $request)
    {
 
        $birthdayDate = $request->year . '-' . $request->month . '-' . $request->day;


        $res = Http::post("https://sso.egaza.ps/api/saveRegister/" . $request->idc, [

            'token' => config('sso.ssoToken'),
            'answer1' => $request->answer_q1,
            'answer2' => $request->answer_q2,
            'password' => $request->password,
            'mobile_primary' => $request->mobile,
            'mobile_secondary' => $request->mobile,
            'birth_date' =>  $birthdayDate,
        ]);

        $data = $res->json();
 
        if ($res->successful() && $data['status'] == true) {

            session([
                'auth_idc' => $data['idc'],
                'auth_full_name' => $data['full_name']
            ]);

            return  redirect()->route(config('sso.redirectRoute'));
        } elseif ($res->successful() && $data['status'] != true) {

            $validator = Validator::make([], []);
            $validator->errors()->add('idc', $data['msg']);
            return redirect()->back()->withErrors($validator)->withInput();

        } else {

            return redirect()->route('sso.login.form')->with('message', __('pack::pack.connection_faild, please try again later'))
                ->with('type', 'danger');
        }
    }

    public static function logout()
    {
        
        if (self::isAuth()) {
       
            session()->forget('auth_idc');
            session()->forget('auth_full_name');
 
        }
        return redirect()->route('sso.login.form');
    }
}
