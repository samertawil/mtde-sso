 @extends('pack::pack-layouts.master')

 @section('content')
 @section('title', __('pack::pack.user login'))



 <div class="d-flex mt-5" style="height: 600px; ">

     <div class="container  m-auto px-5  ">

         <div>

             <div class=" fw-bolder h4 text-dark d-flex justify-content-center align-items-center">
                 <div>

                     <strong class="mx-2">{{ env('APP_NAME') }} </strong>


                     {{ session('auth_idc') }}

                 </div>



             </div>
         </div>


         <div class="row justify-content-center mt-4">
             <div class="col-md-6">
                 <div class="card ">

                     <div class="d-flex justify-content-between card-header ">
                         <span>{{ __('pack::pack.user login') }} </span>
                         <a class="text-decoration-none" style="float: left;"
                             href="#">{{ __('pack::pack.about login system') }}</a>
                     </div>
               

                     <div class="mt-3">
                         @include('pack::pack-layouts._alert-session')
                     </div>

                     <div class="card-body">
                         <form action="{{ route('sso.login') }}" method="POST">
                             @csrf

                             <div class=" mb-3">
                                 <label for="idc" class="  col-form-label ">{{ __('pack::pack.idc') }}</label>

                                 <div class=" ">
                                     <input id="idc" type="text"
                                         class="form-control     @error('idc') is-invalid @enderror" name="idc"
                                         value="{{ old('idc') }}" required autocomplete="idc" autofocus
                                         dir="ltr">

                                     @error('idc')
                                         <span class="invalid-feedback" role="alert">
                                             <small>{{ $message }}</small>
                                         </span>
                                     @enderror
                                 </div>
                             </div>

                             <div class=" mb-3">
                                 <label for="password" class="  col-form-label">{{ __('pack::pack.password') }}</label>

                                 <div  style="direction: ltr;">
                                     <input id="password" type="password"
                                         class="form-control   @error('password') is-invalid @enderror" name="password"
                                         required autocomplete="current-password">

                                     @error('password')
                                         <span class="invalid-feedback" role="alert">
                                             <small>{{ $message }}</small>
                                         </span>
                                     @enderror
                                 </div>
                             </div>

                             <div class="row mb-1">
                                 <div class="col-md-4 ">
                                     <div class="form-check">
                                         <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                             {{ old('remember') ? 'checked' : '' }}>

                                         <label class="form-check-label" for="remember">
                                             {{ __('pack::pack.Remember Me') }}
                                         </label>
                                     </div>
                                 </div>
                             </div>

                             <div class="d-grid gap-2">

                                 <button type="submit" class="  btn btn-primary btn-block my-4">
                                     {{ __('pack::pack.Login') }}
                                 </button>
                             </div>
                         </form>


                         <div class="d-md-flex justify-content-between">
                             <div class="mb-4" id="change_id">

                                 <a href="{{ route('sso.forgetPassword.create') }}" id="btn1"
                                     class="text-decoration-none ">{{ __('pack::pack.Forgot Your Password') }} ؟
                                 </a>
                             </div>

                             <a href="{{ route('sso.register.create') }}"
                                 class="text-decoration-none">{{ __('pack::pack.register_new_account') }}</a>
                         </div>


                         <div class="d-md-flex justify-content-between">
                            

                            <a href="{{ route('sso.changePassword-form') }}"
                                class="text-decoration-none">{{ __('pack::pack.change password') }}</a>
                        </div>


                     </div>

                 </div>
                 @include('pack::pack-layouts._lang')
             </div>

         </div>

     </div>

 </div>


@endsection
