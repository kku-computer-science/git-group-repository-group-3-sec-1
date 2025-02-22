@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Dashboard')

@section('content')

<h3 style="padding-top: 10px;">{{ trans('message.Welcome') }}</h3>
<br>
<h4>{{ trans('message.Welcome_hello') }} {{Auth::user()->position_th}} {{Auth::user()->fname_th}} {{Auth::user()->lname_th}}</h2>

@endsection
