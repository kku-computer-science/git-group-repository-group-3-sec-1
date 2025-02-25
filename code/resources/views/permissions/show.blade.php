@extends('dashboards.users.layouts.user-dash-layout')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">{{ trans('message.Permission_navbar_title') }}
                @can('role-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('permissions.index') }}">{{ trans('message.Back_button') }}</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>{{ trans('message.Permission_name') }}:</strong>
                    {{ $permission->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection