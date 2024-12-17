<?php

namespace mtde\sso\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Intervention\Image\Colors\Rgb\Channels\Red;
use Symfony\Component\HttpFoundation\Response;

class ssoAuth
{

    public function handle(Request $request, Closure $next): Response
    {
        if(session('auth_idc')) {
            return $next($request);
        };
        return redirect()->route('sso.login.form') ;
       
    }
}
