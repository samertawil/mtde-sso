<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google" content="notranslate">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('pack-assets/css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('pack-assets/css/main.css') }}">

    @yield('css-link')

 
    <title>@yield('title', env('APP_NAME'))</title>
 
    @yield('css')

</head>

<body>


    <div>


        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-0">
                    <div class="col-sm-6">
                        <h3 class="m-0">@yield('page-name')</h3>
                    </div>
                   
                </div>
            </div>
        </div>

        <div>

            @yield('content')

        </div>


    </div>

    <script src="{{ asset('pack-assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('pack-assets/js/jQuery.js') }}"></script>

{{--     
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/loaders/blockui.min.js') }}"></script>
    <script src="{{ asset('js/blockui.js') }}"></script> --}}


    @yield('js')
</body>

</html>
