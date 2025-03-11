@extends('dashboards.users.layouts.user-dash-layout')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>{{ trans('message.error_input.Whoops') }}</strong>
            {{ trans('message.error_input.Error_problem') }}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card col-8" style="padding: 16px;">
            <div class=" card-body">
                <h4 class="card-title">{{ trans('message.Edit_user') }}</h4>
                <p class="card-description">{{ trans('message.Edit_user_detail') }}</p>
                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH']) !!}
                <div class="form-group row">
                    <div class="col-sm-6">
                        <p><b>{{ trans('message.User_fname_th') }}</b></p>
                        <input type="text" name="fname_th" value="{{ $user->fname_th }}" class="form-control"
                            placeholder="{{ $user->fname_th }}">
                    </div>
                    <div class="col-sm-6">
                        <p><b>{{ trans('message.User_lname_th') }}</b></p>
                        <input type="text" name="lname_th" value="{{ $user->lname_th }}" class="form-control"
                            placeholder="{{ $user->lname_th }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <p><b>{{ trans('message.User_fname_en') }}</b></p>
                        <input type="text" name="fname_en" value="{{ $user->fname_en }}" class="form-control"
                            placeholder="{{ $user->fname_en }}">
                    </div>
                    <div class="col-sm-6">
                        <p><b>{{ trans('message.User_lname_en') }}</b></p>
                        <input type="text" name="lname_en" value="{{ $user->lname_en }}" class="form-control"
                            placeholder="{{ $user->lname_en }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <p><b>{{ trans('message.User_fname_cn') }}</b></p>
                        <input type="text" name="fname_cn" value="{{ $user->fname_cn }}" class="form-control"
                            placeholder="{{ $user->fname_cn }}">
                    </div>
                    <div class="col-sm-6">
                        <p><b>{{ trans('message.User_lname_cn') }}</b></p>
                        <input type="text" name="lname_cn" value="{{ $user->lname_cn }}" class="form-control"
                            placeholder="{{ $user->lname_cn }}">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.User_email') }}</b></p>
                    <div class="col-sm-8">
                        <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.User_passwrord') }}</b></p>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.User_confirm_password') }}</b></p>
                    <div class="col-sm-8">
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                </div>
                <div class="form-group col-sm-8">
                    <p><b>{{ trans('message.User_role') }}:</b></p>
                    <div class="col-sm-8">
                        @php
                        $locale = app()->getLocale();

                        // แปลบทบาท (roles) ตามภาษาที่เลือก
                        $roles_translated = array_map(function ($role) use ($locale) {
                        return match ($locale) {
                        'th' => match ($role) {
                        'admin' => 'ผู้ดูแลระบบ',
                        'teacher' => 'อาจารย์',
                        'student' => 'นักเรียน',
                        'headproject' => 'หัวหน้าโครงการ',
                        'staff' => 'เจ้าหน้าที่',
                        default => $role,
                        },
                        'en' => match ($role) {
                        'admin' => 'Admin',
                        'teacher' => 'Teacher',
                        'student' => 'Student',
                        'headproject' => 'Head Project',
                        'staff' => 'Staff',
                        default => $role,
                        },
                        'cn' => match ($role) {
                        'admin' => '管理员',
                        'teacher' => '老师',
                        'student' => '学生',
                        'headproject' => '项目负责人',
                        'staff'=> '职员',
                        default => $role,
                        },
                        default => $role,
                        };
                        }, $roles);

                        // กำหนด placeholder สำหรับ dropdown
                        $placeholder = match($locale) {
                        'th' => 'กรุณาเลือกบทบาท',
                        'en' => 'Please select role',
                        'cn' => '请选择角色',
                        default => 'Please select role',
                        };
                        @endphp

                        <!-- เพิ่ม option placeholder แรกก่อนบทบาท -->
                        <select name="roles[]" class="form-control selectpicker" multiple>
                            <option value="" disabled selected>{{ $placeholder }}</option>
                            @foreach ($roles_translated as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.User_status') }}</b></p>
                    <div class="col-sm-8">
                        <select id='status' class="form-control" style='width: 200px;' name="status">
                            <option value="1" {{ "1" == $user->status ? 'selected' : '' }}>
                                {{ trans('message.User_status_studying') }}
                            </option>
                            <option value="2" {{ "2" == $user->status ? 'selected' : '' }}>
                                {{ trans('message.User_status_graduated') }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <p for="category"><b>{{ trans('message.User_department') }} <span
                                    class="text-danger">*</span></b></p>
                        <select class="form-control" name="cat" id="cat" style="width: 100%;" required>
                            <option>{{ trans('message.User_select_category') }}</option>
                            @foreach ($departments as $cat)
                            @php
                            $locale = app()->getLocale();
                            $departmentName = $locale == 'th' ? ($cat->department_name_th ?? $cat->department_name_en ?? $cat->department_name_cn) :
                            ($locale == 'en' ? ($cat->department_name_en ?? $cat->department_name_th ?? $cat->department_name_cn) :
                            ($cat->department_name_cn ?? $cat->department_name_en ?? $cat->department_name_th));
                            @endphp
                            <option value="{{$cat->id}}" {{$user->program->department_id == $cat->id ? 'selected' : ''}}>
                                {{ $departmentName }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <p for="category"><b>{{ trans('message.User_program') }} <span class="text-danger">*</span></b>
                        </p>
                        <select class="form-control select2" name="sub_cat" id="subcat" required>
                            <option>{{ trans('message.User_select_sub_category') }}</option>
                            @foreach ($programs as $cat)
                            @php
                            $locale = app()->getLocale();
                            $programName = $locale == 'th' ? ($cat->program_name_th ?? $cat->program_name_en ?? $cat->program_name_cn) :
                            ($locale == 'en' ? ($cat->program_name_en ?? $cat->program_name_th ?? $cat->program_name_cn) :
                            ($cat->program_name_cn ?? $cat->program_name_en ?? $cat->program_name_th));
                            @endphp
                            <option value="{{$cat->id}}" {{$user->program->id == $cat->id ? 'selected' : ''}}>
                                {{ $programName }}
                            </option>
                            @endforeach
                        </select>
                    </div>


                </div>

                <button type="submit" class="btn btn-primary mt-5">{{ trans('message.Submit_button') }}</button>
                <a class="btn btn-light mt-5" href="{{ route('users.index') }}">{{ trans('message.Cancle_button') }}</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<script>
    $('#cat').on('change', function(e) {
        var cat_id = e.target.value;
        var currentLocale = '{{ App::getLocale() }}'; // Get current locale

        $.get('/ajax-get-subcat?cat_id=' + cat_id, function(data) {
            $('#subcat').empty();
            $.each(data, function(index, areaObj) {
                var degreeTitle, programName;

                // Set degree title based on language
                if (currentLocale === 'th') {
                    degreeTitle = areaObj.degree.title_th;
                    programName = areaObj.program_name_th;
                } else if (currentLocale === 'en') {
                    degreeTitle = areaObj.degree.title_en;
                    programName = areaObj.program_name_en;
                } else if (currentLocale === 'cn') {
                    degreeTitle = areaObj.degree.title_cn;
                    programName = areaObj.program_name_cn;
                }

                // Add translation for "in" word
                var inWord = currentLocale === 'th' ? 'ใน' :
                    currentLocale === 'cn' ? '在' : 'in';

                $('#subcat').append('<option value="' + areaObj.id + '">' +
                    degreeTitle + ' ' + inWord + ' ' + programName +
                    '</option>');
            });
        });
    });
</script>
@endsection