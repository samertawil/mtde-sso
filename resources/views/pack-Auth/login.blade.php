<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('pack-assets/css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('pack-assets/css/main.css') }}">

    <title>تسجيل الدخول</title>
</head>


<body>


    <div class="d-flex mt-5" style="height: 600px; ">

        <div class="container  m-auto px-5  ">

            <div>

                <div class=" fw-bolder h4 text-dark d-flex justify-content-center align-items-center">
                    <div>
                        <div>
                            <strong class="mx-2"> المساعدات والإغاثة الإنسانية </strong>
                        </div>

                        <div class="text-center pt-2">
                            <small> غزة والشمال</small>

                            @php
                                //mapping
                                $pos = strpos(LaravelLocalization::getCurrentLocaleRegional(), '_');
                                $LocaleRegional = substr(LaravelLocalization::getCurrentLocaleRegional(), 0, $pos);

                            @endphp




                        </div>

                        {{ session('auth_idc') }}

                    </div>



                </div>
            </div>


            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <div class="card ">

                        <div class="card-header "> <span>{{ __('pack::pack.user login') }} </span> <a
                                class="text-decoration-none" style="float: left;" {{-- href="{{route('about-us')}}">حول الاغاثة?</a>  </div> --}}
                                href="#">{{ __('pack::pack.about login system') }}</a> </div>
                        <div>

                        </div>

                        <div class="mt-3">
                            @include('pack::pack-layouts._alert-session')
                        </div>

                        <div class="card-body">
                            <form action="{{ route('login') }}" method="POST">
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
                                    <label for="password"
                                        class="  col-form-label">{{ __('pack::pack.password') }}</label>

                                    <div class=" ">
                                        <input id="password" type="password"
                                            class="form-control   @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col-md-6 ">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>

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

                                    <a href="{{ route('forgetPassword.create') }}" id="btn1"
                                        class="text-decoration-none ">{{ __('pack::pack.Forgot Your Password') }} ؟
                                    </a>
                                </div>

                                <a href="{{ route('register.create') }}"
                                    class="text-decoration-none">{{ __('pack::pack.register_new_account') }}</a>
                            </div>
                            {{-- {{$LocaleRegional}} --}}


                        </div>

                    </div>
                    @include('pack::pack-layouts._lang')
                </div>

            </div>

        </div>

    </div>


    <script src="{{ asset('pack-assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('pack-assets/js/jQuery.js') }}"></script>

</body>

</html>
