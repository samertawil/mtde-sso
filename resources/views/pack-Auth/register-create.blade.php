<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google" content="notranslate">

    <link rel="stylesheet" href="{{asset('pack-assets/css/bootstrap.rtl.css')}}">
    <link rel="stylesheet" href="{{asset('pack-assets/css/main.css')}}">
    <title>تسجيل حساب</title>
</head>

<body>



    <form action="{{ route('registration.form') }}" method="get">
         
        @include('pack::pack-auth._chk-idc-form',['buttontitle'=>'البدء بعملية التسجيل'])
       
    </form>



    <script src="{{ asset('pack-assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('pack-assets/js/jQuery.js') }}"></script>


</body>

</html>


