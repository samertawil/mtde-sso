@extends('pack::pack-layouts.master')

@section('content')
@section('title', __('pack::pack.register_new_account'))





<form action="{{ route('sso.register.form') }}" method="get">
    
    
    @include('pack::pack-auth._chk-idc-form', [
        'buttontitle' => __('pack::pack.begin register'),
        'title' => __('pack::pack.register_new_account'),
    ])

</form>


@endsection
