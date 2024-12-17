@extends('pack::pack-layouts.master')

@section('content')
@section('title', __('pack::pack.Forgot Your Password'))



    <form action="{{ route('sso.forgetPassword.form') }}" method="get">

        @include('pack::pack-auth._chk-idc-form',['title'=>__('pack::pack.Forgot Your Password')])

    </form>

 

@endsection