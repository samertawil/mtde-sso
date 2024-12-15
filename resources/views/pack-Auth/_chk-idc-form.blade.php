<div class="d-flex" style="height: 600px; ">

    <div class="container  m-auto px-5  ">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card ">

                    <div class="card-header ">حسابات المستخدمين</div>

                    <div class="card-body">

                        @include('pack::pack-layouts._alert-session')
                        
                        <div class="">
                            <label for="idc"
                                class="  col-form-label required ">{{ __('pack::pack.idc') }}</label>

                            <div>
                                <input id="idc" type="text"
                                    class="form-control @error('idc') is-invalid @enderror" name="idc"
                                    value="{{ old('idc') }}" autocomplete="idc" autofocus dir="ltr">

                                @error('idc')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="d-grid gap-2">

                            <button type="submit" class="  btn btn-primary btn-block my-5">
                                {{ $buttontitle ?? 'استمرار' }}

                            </button>


                        </div>
                        <div class="text-end">
                            <a href="{{ route('login') }}" class="text-decoration-none text-end"> إلغاء ورجوع </a>
                        </div>






                    </div>
                </div>
                @include('pack::pack-layouts._lang')
            </div>
        </div>
    </div>
</div>
