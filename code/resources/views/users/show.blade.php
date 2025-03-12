@extends('dashboards.users.layouts.user-dash-layout')
@section('content')

<div class="container">
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div>
    @endif
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">{{ trans('message.User_detail') }}</h4>
                <p class="card-description">{{ trans('message.User_description') }}</p>
                <div class="row mt-2">
                    <h6 class="col-md-3"><b>{{ trans('message.User_full_name_th') }}</b></h6>
                    <h6 class="col-md-9">{{$user->title_name_th}} {{ $user->fname_th }} {{ $user->lname_th }}</h6>
                </div>
                <div class="row mt-2">
                    <h6 class="col-md-3"><b>{{ trans('message.User_full_name_en') }}</b></h6>
                    <h6 class="col-md-9">{{$user->title_name_en}} {{ $user->fname_en }} {{ $user->lname_en }}</h6>
                </div>
                <div class="row mt-2">
                    <h6 class="col-md-3"><b>{{ trans('message.User_full_name_cn') }}</b></h6>
                    <h6 class="col-md-9">{{$user->title_name_cn}} {{ $user->fname_cn }} {{ $user->lname_cn }}</h6>
                </div>
                <div class="row mt-2">
                    <h6 class="col-md-3"><b>{{ trans('message.User_email') }}:</b></h6>
                    <h6 class="col-md-9">{{ $user->email }}</h6>
                </div>
                @foreach($user->getRoleNames() as $val)
                <div class="row mt-2">
                    <h6 class="col-md-3"><b>{{ trans('message.User_role') }} </b></h6>
                    <h6 class="col-md-9">
                        @php
                        $locale = app()->getLocale();
                        $role = match ($locale) {
                        'th' => match ($val) {
                        'admin' => 'ผู้ดูแลระบบ',
                        'teacher' => 'อาจารย์',
                        'student' => 'นักเรียน',
                        'headproject' => 'หัวหน้าโครงการ',
                        'staff' => 'เจ้าหน้าที่',
                        default => $val,
                        },
                        'en' => match ($val) {
                        'admin' => 'Admin',
                        'teacher' => 'Teacher',
                        'student' => 'Student',
                        'headproject' => 'Head Project',
                        'staff' => 'Staff',
                        default => $val,
                        },
                        'cn' => match ($val) {
                        'admin' => '管理员',
                        'teacher' => '老师',
                        'student' => '学生',
                        'headproject' => '项目负责人',
                        'staff' => '职员',
                        default => $val,
                        },
                        default => $val,
                        };
                        @endphp
                        <label class="badge badge-dark">{{ $role }}</label>
                    </h6>
                </div>
                @endforeach
            </div>

            @if($val == "teacher")
            <div class="row mt-2">
                <h6 class="col-md-3"><b> {{ trans('message.User_academic_rank') }} </b></h6>
                <h6 class="col-md-9">@if(App::getLocale() == 'th')
                    {{ $user->academic_ranks_th }}
                    @elseif(App::getLocale() == 'en')
                    {{ $user->academic_ranks_en }}
                    @elseif(App::getLocale() == 'cn')
                    {{ $user->academic_ranks_ch }}
                    @endif
                </h6>
            </div>
            <div class="row mt-2">
                <h6 class="col-md-3"><b>{{ trans('message.User_department') }} </b></h6>
                <h6 class="col-md-9">{{ $user->program->department->department_name_en }}</h6>
            </div>
            <div class="row mt-2">
                <h6 class="col-md-3"><b>{{ trans('message.User_program') }} </b></h6>
                <h6 class="col-md-9">@if(App::getLocale() == 'th')
                    {{ $user->program->program_name_th }}
                    @elseif(App::getLocale() == 'en')
                    {{ $user->program->program_name_en }}
                    @elseif(App::getLocale() == 'cn')
                    {{ $user->program->program_name_cn }}
                    @endif
                </h6>
                </h6>
            </div>


            <div class="row mt-2">
                <h6 class="col-md-3"><b>{{ trans('message.User_edu_background') }} </b></h6>

                <h6 class="col-md-4" style="line-height:1.4;">@foreach( $user->education as $edu){{$edu->qua_name}} <br>@endforeach</h6>
                <h6 class="col-md-5" style="line-height:1.4;">@foreach( $user->education as $edu){{$edu->uname}} <br>@endforeach</h6>
            </div>
            @endif
            <div class="row mt-2">
                <h6 class="col-md-3"><b>{{ trans('message.User_password') }}:</b></h6>
                <h6 class="col-md-9"></h6>
            </div>

            @can('role-create')
            <a class="btn btn-primary btn-sm mt-5" href="{{ route('users.index') }}">{{ trans('message.Back_button') }}</a>
            @endcan
        </div>
    </div>
</div>
</div>

@endsection