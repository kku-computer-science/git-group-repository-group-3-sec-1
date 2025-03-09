@extends('dashboards.users.layouts.user-dash-layout')
@section('title', 'Dashboard')

@section('content')

    <h3 style="padding-top: 10px;">{{ trans('message.Welcome') }}</h3>
    <br>
    <h4>{{ trans('message.Welcome_hello') }}
        @if (App::getLocale() == 'th')
            {{ Auth::user()->position_th }} {{ Auth::user()->fname_th }} {{ Auth::user()->lname_th }}
        @elseif(App::getLocale() == 'en')
            {{ Auth::user()->position_en }} {{ Auth::user()->fname_en }} {{ Auth::user()->lname_en }}
        @elseif(App::getLocale() == 'cn')
            {{ Auth::user()->position_cn ?? Auth::user()->position_en }}
            {{ Auth::user()->fname_cn ?? Auth::user()->fname_en }}
            {{ Auth::user()->lname_cn ?? Auth::user()->lname_en }}
        @endif
    </h4>
@endsection

