<?php

namespace  mtde\sso\Http\Controllers\pack_Auth;

 
 
use Illuminate\Http\Request;
use mtde\sso\Http\Models\Account;
use mtde\sso\Http\Models\citizen;
 
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use mtde\sso\Http\Requests\ChkIdcRequest;
use mtde\sso\Http\Requests\RegisterRequest;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
     
    use RegistersUsers;

 
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



 
    public function register_create()
    {
    
        return view('pack::pack-Auth.register-create');
    }

    public function showRegistrationForm(ChkIdcRequest $request)
    {
       
        $citizen = citizen::where('idc', $request->idc)->first();
 
        return view('pack::pack-Auth.register', compact('citizen'));
    }

     
    public function register_store(RegisterRequest $request, $idc)
    {
        $birthdayDate=$request->year.'-'.$request->month.'-'.$request->day;
        
        $citizen = citizen::where('idc', $idc)->first();

        $validator = Validator::make($request->all(), []);

        $citizen = citizen::where('idc', $idc)->first();
 
        // if (!($citizen->CI_BIRTH_DT == $request->birthday)) {
        if (!($citizen->CI_BIRTH_DT == $birthdayDate)) {

            $validator->errors()->add('birthday', 'تاريخ الميلاد غير صحيح');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (!($citizen->answer_q1 == $request->answer_q1 && $citizen->answer_q2 == $request->answer_q2)) {

            $validator->errors()->add('answer_alert', ' خطأ بإجابة الاسئلة ');

            return redirect()->back()->withErrors($validator)->withInput();
        }
        


        $full_name = ($citizen->CI_FIRST_ARB . ' ' . $citizen->CI_FATHER_ARB . ' ' . $citizen->CI_GRAND_FATHER_ARB . ' ' . $citizen->CI_FAMILY_ARB);

        $user =  Account::create([
            'idc' => $idc,
            'mobile' => $request->mobile,
            'user_name' => $idc,
            'full_name' =>  $full_name,
            'email' => null,
            'password' => Hash::make($request->password),
        ]);


        Auth::loginUsingId($user->id);

        return redirect('/');
    }
}
