<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <link rel="stylesheet" href="{{ asset('pack-assets/css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('pack-assets/css/main.css') }}">


</head>

<body>

    <div class="container my-5">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        @if (session('auth_idc'))
            <main class="py-4">

                {{-- {{ mtde\sso\Http\Controllers\PackAuth\AuthController::printAuthData()['idc']  }} --}}
                {{ session('auth_idc') }}
                {{ session('auth_full_name') }}

                <div class="mt-3">
                    <a href="{{ route('sso.logout') }}">{{ __('pack::pack.Logout') }}</a>
                </div>

            </main>

        @else
        <div class="mt-3">
            <li class="nav-item">
                <a class="" href="{{ route('sso.login.form') }}">{{ __('Login') }}</a>
            </li>



            <li class="nav-item">
                <a class="" href="{{ route('sso.register.create') }}">{{ __('Register') }}</a>
            </li>
        </div>
           
        @endif


    </div>



    <script src="{{ asset('pack-assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('pack-assets/js/jQuery.js') }}"></script>
</body>

</html>
