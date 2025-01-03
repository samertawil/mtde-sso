 


@extends('pack::pack-layouts.master')

@section('content')
@section('title',__('pack::pack.register_new_account'))

 
    <div class="d-flex mt-4" style="height: 750px;">
        <div class="container m-auto">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                    
                        <div class="card-header">{{ __('pack::pack.register_new_account') }}</div>

                        @include('pack::pack-layouts._error-form')
                        
                        @include('pack::pack-layouts._alert-session')

                        <div class="card-body">
                         {{-- here --}}
                            <form method="POST" action="{{ route('sso.register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="idc"
                                        class="col-md-4 col-form-label text-md-end required">{{ __('pack::pack.idc') }}</label>

                                    <div class="col-md-6">
                                        <input id="idc" type="text"
                                            class="form-control @error('idc') is-invalid @enderror" name="idc"
                                           value="{{ old('idc', $idc) }}" autocomplete="idc"
                                           readonly  >

                                        @error('idc')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>



                                </div>

                                <div class="row mb-3">
                                    <label for="mobile"
                                        class="col-md-4 col-form-label text-md-end required">{{ __('pack::pack.mobile') }}
                                    </label>

                                    <div class="col-md-6">
                                        <input id="mobile" type="number"
                                            class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                            value="{{ old('mobile') }}" autocomplete="mobile">

                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="row mb-4 align-items-center">
                                    <label for="birthday"
                                        class="mt-4 col-md-4 col-form-label text-md-end required">{{ __('pack::pack.birthday') }}

                                    </label>

                                    <div class="col-4 col-md-2 text-center">
                                        <label for="" class="mb-2">{{ __('pack::pack.year') }}</label>
                                        <select name="year" id=""
                                            class="form-select @error('year') is-invalid @enderror">
                                            <option value=""></option>
                                            @for ($i = 2008; $i >= 1900; $i--)
                                                <option value="{{ $i }}" @selected(old('year') == $i)>
                                                    {{ $i }}</option>
                                            @endfor

                                        </select>
                                        @error('year')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror

                                    </div>



                                    <div class="col-4 col-md-2 text-center">
                                        <label for="" class="mb-2">{{ __('pack::pack.month') }}</label>
                                        <select name="month" id=""
                                            class="form-select @error('month') is-invalid @enderror">
                                            <option value=""></option>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i < 10 ? '0' . $i : $i }}"
                                                    @selected(old('month') == $i)>
                                                    {{ $i < 10 ? '0' . $i : $i }}</option>
                                            @endfor

                                        </select>

                                        @error('month')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-4 col-md-2 text-center">
                                        <label for="" class="mb-2">{{ __('pack::pack.day') }}</label>
                                        <select name="day" id=""
                                            class="form-select @error('day') is-invalid @enderror">
                                            <option value=""></option>
                                            @for ($i = 1; $i <= 31; $i++)
                                                <option value="{{ $i < 10 ? '0' . $i : $i }}"
                                                    @selected(old('day') == $i)>
                                                    {{ $i < 10 ? '0' . $i : $i }}</option>
                                            @endfor

                                        </select>
                                        @error('day')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="birthday"
                                        class=" @error('birthday') is-invalid
                                            
                                    @enderror">
                                    @error('birthday')
                                        <span class="invalid-feedback  text-lg-center " role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>

                             
                                @if ($q1)
                                    <div class="row mb-3">

                                        <label for="q1" class="col-md-4 col-form-label text-md-end required">{{__('pack::pack.q1')}}
                                            </label>

                                        <div class="col-md-3">
                                            <p id="q1_p" type="text" class="form-control border-0">
                                              
                                                {{ $q1 }}؟
                                            </p>

                                        </div>

                                        <div class="col-md-3">
                                            <input name="answer_q1" type="text" value="{{ old('answer_q1') }}"
                                                @class(['form-control', 'is-invalid' => $errors->has('answer_q1')])>
                                            @include('pack::pack-layouts._show-error', [
                                                'field_name' => 'answer_q1',
                                            ])
                                           <small class="text-muted">{{__('pack::pack.ex')}} 2012</small>
                                        </div>

                                    </div>
                                @endif
                              
                                @if ($q2)
                                    <div class="row mb-3">

                                        <label for="q2" class="col-md-4 col-form-label text-md-end required">{{__('pack::pack.q2')}}
                                            </label>

                                        <div class="col-md-3">
                                            <p id="q2_p" type="text" class="form-control border-0">
                                
                                                {{ $q2 }}؟
                                            </p>

                                        </div>

                                        <div class="col-md-3">
                                            <input name="answer_q2" value="{{ old('answer_q2') }}"
                                                @class(['form-control', 'is-invalid' => $errors->has('answer_q2')])>
                                            @include('pack::pack-layouts._show-error', [
                                                'field_name' => 'answer_q2',
                                            ])
                                               <small class="text-muted">{{__('pack::pack.ex')}} 1983</small>
                                        </div>
                                     
                                    </div>
                                @endif


                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end required">{{ __('pack::pack.password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end required">
                                        {{ __('pack::pack.password_confirm') }} </label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" autocomplete="new-password">
                                    </div>
                                </div>




                                <div class="row mb-0 ">
                                    <div class="col-md-6 offset-md-4 text-end">
                                        <button type="submit" class="btn btn-primary">
                                            {{__('pack::pack.register')}}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @include('pack::pack-layouts._lang')
                </div>
            </div>
        </div>
    </div>


    @endsection