
@php
$current = LaravelLocalization::getCurrentLocale();
@endphp


<div class="text-center w-100">

    @if ($current == 'en')
        <a rel="alternate" hreflang="ar"
            href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
            <span style="font-size: 12px;">{{ ' العربية ' }} </span> </a> <small
            style="font-size: 12px;">{{ __('pack::pack.langName') }}</small>
    @else
        <small style="font-size: 12px;">{{ __('pack::pack.langName') }}</small>

        <a rel="alternate" hreflang="en"
            href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
            <span style="font-size: 12px;"> </small> {{ 'English' }}</span> </a>
    @endif
</div>