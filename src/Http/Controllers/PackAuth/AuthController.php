<?php

namespace mtde\sso\Http\Controllers\PackAuth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use mtde\sso\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Validator;
use mtde\sso\Http\Requests\ChkIdcRequest;
use mtde\sso\Http\Requests\RegisterRequest;

class AuthController
{

    protected $redirectTo = 'test11';

    public function showLoginForm()
    {
     
        $user=session('auth_idc');
   
        if(is_null($user)) {
            return view('pack::pack-auth.login');
        } else {
            return redirect('/');
        }
      
    }
   
    public function login(LoginRequest $request)
    {
    
     
        $res =  Http::post("https://sso.egaza.ps/api/login", [
            'token' => 'YWZtxm6iQp7CPmVFwLAUMt2HefbaUHnXSVrKHoJk',
            'idc' => $request->idc,
            'password' => $request->password
        ]);

        $data = $res->json();
       
        if ($res->successful() && $data['status'] == true) {
            
            $data = $res->json();
            
            session([
                'auth_idc' => $data['idc'],
                'auth_full_name'=> $data['full_name'],
            ]);

               return redirect('/');

        } elseif ($res->successful() && $data['status'] != true) {

            $validator = Validator::make([], []);
            $validator->errors()->add('idc', $data['msg']);
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            return redirect()->route('login')->with('message', __('pack::pack.connection_faild, please try again later'))
                ->with('type', 'danger');
        }
    }

    

    // register methods
    public static function getPersonalData($idc)
    {

       
        $res = Http::post("https://sso.egaza.ps/api/register/".$idc ,[
           
            'token'=>"YWZtxm6iQp7CPmVFwLAUMt2HefbaUHnXSVrKHoJk",
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

    public static function register_create()
    {

        return view('pack::pack-auth.register-create');
    }

    public function register(ChkIdcRequest $request)
    {

        $this->getPersonalData($request->idc);

        if (session('idc')) {
            $full_name = session('full_name');
            $idc = session('idc');
            $q1 = session('q1');
            $q2 = session('q2');
            return view('pack::pack-auth.register',  compact('full_name', 'idc', 'q1', 'q2'));
        } else {

            $validator = Validator::make([], []);
            $validator->errors()->add('idc', session('wrongMsg'));
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    

    public function saveRegister(RegisterRequest $request, $idc)
    {

        $birthdayDate = $request->year . '-' . $request->month . '-' . $request->day;


        $res = Http::post("https://sso.egaza.ps/api/saveRegister/" . $idc, [

            'token' => 'YWZtxm6iQp7CPmVFwLAUMt2HefbaUHnXSVrKHoJk',
            'answer1' => $request->answer_q1,
            'answer2' => $request->answer_q2,
            'password' => $request->password,
            'mobile_primary' => $request->mobile,
            'mobile_secondary' => $request->mobile,
            'birth_date' =>  $birthdayDate,
        ]);


        if ($res->successful()) {

            $data = $res->json();
    
                    
            session([
                'auth_idc' =>$data['idc'],
                'auth_full_name'=>$data['full_name']
            ]);
            
               
          return session(['auth_idc','auth_full_name']);

        } else {

           
            $errors = json_decode($res, true);
                     
          return redirect()->back()->withErrors($errors['msg']);

          session_destroy();
        }

           
            $errors = json_decode($res, true);

            return redirect()->back()->withErrors($errors['msg']);

            session_destroy();
    }

    public function logout(Request $request) {
        // session()->flush();
        //    session()->forget('auth_idc');
        //    Session::flush();
        // $request->session()->destroy(); 
        dd(session('auth_idc')); 
       dd(session()->all(),session('auth_idc'));
    }



    
}
