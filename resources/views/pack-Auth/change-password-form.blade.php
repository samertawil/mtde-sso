<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google" content="notranslate">
    <link rel="stylesheet" href="{{ asset('pack-assets/css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('pack-assets/css/main.css') }}">

    <title>تعيين كلمة المرور</title>
</head>

<body>

    @include('pack::pack-layouts._alert-session')

    <div class="d-flex mt-4" style="height: 600px;">
        <div class="container m-auto">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">اعادة تعيين كلمة المرور</div>

                        <div class="card-body">
                            <form action="{{ route('changePassword') }}" method="POST">
                                @csrf

                                @include('pack::pack-layouts._alert-session')
                                @include('pack::pack-layouts._error-form')
    

                                <div class="row mb-3">
                                    <label for="idc"
                                        class="col-md-4 col-form-label text-md-end required">{{ __('pack::pack.idc') }}</label>

                                    <div class="col-md-6">
                                        <input id="idc" type="number"
                                            class="form-control @error('idc') is-invalid @enderror" name="idc"
                                            value="{{ old('idc') }}" >

                                        @error('idc')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <label for="old_password" class="col-md-4 col-form-label text-md-end required">كلمة المرور
                                        القديمة</label>

                                    <div class="col-md-6">
                                        <input id="old_password" type="password"
                                            class="form-control @error('old_password') is-invalid @enderror"
                                            name="old_password" value="{{old('old_password')}}">

                                        @error('old_password')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end required">كلمة المرور
                                        الجديدة</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-end required"> تأكيد
                                        كلمة المرور </label>

                                    <div class="col-md-6">
                                        <input id="password_confirmation" type="password" class="form-control"
                                            name="password_confirmation">
                                    </div>
                                </div>




                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">
                                        تحديث
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('pack-assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('pack-assets/js/jQuery.js') }}"></script>


</body>

</html>
