<?php

namespace mtde\sso\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use mtde\sso\Http\Models\Account;
use Illuminate\Support\Facades\Validator;

class CheckIdc
{

    public function handle(Request $request, Closure $next)
    {


        $validator = Validator::make($request->all(), [

            // 'idc' => 'required',
        ]);

        $user = Account::select('id', 'idc')->where('idc', $request->idc)->first();

        if (!$user) {
            
            $validator->errors()->add('idc', 'لا يوجد حساب لرقم الهوية المدخل');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        return $next($request);
    }
}
