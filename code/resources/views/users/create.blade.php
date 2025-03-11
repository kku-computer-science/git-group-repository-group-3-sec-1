@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>{{ trans('message.error_input.Whoops') }}</strong> {{ trans('message.error_input.Error_problem') }}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card" style="padding: 16px;">
                <div class="card-body">
                    <h4 class="card-title mb-5">{{ trans('message.Create_user') }}</h4>
                    <p class="card-description">{{ trans('message.Input_user_detail') }}</p>
                    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <p><b>{{ trans('message.User_fname_th') }}</b></p>
                            {!! Form::text('fname_th', null, array('placeholder' => app()->getLocale() == 'th' ? 'กรอกชื่อ (ไทย)' : (app()->getLocale() == 'en' ? 'Enter First Name (Thai)' : '输入名字（泰语）'), 'class' => 'form-control')) !!}
                        </div>
                        <div class="col-sm-6">
                            <p><b>{{ trans('message.User_lname_th') }}</b></p>
                            {!! Form::text('lname_th', null, array('placeholder' => app()->getLocale() == 'th' ? 'กรอกนามสกุล (ไทย)' : (app()->getLocale() == 'en' ? 'Enter Last Name (Thai)' : '输入姓氏（泰语）'), 'class' => 'form-control')) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <p><b>{{ trans('message.User_fname_en') }}</b></p>
                            {!! Form::text('fname_en', null, array('placeholder' => app()->getLocale() == 'en' ? 'Enter First Name (English)' : (app()->getLocale() == 'th' ? 'กรอกชื่อ (อังกฤษ)' : '输入名字（英语）'), 'class' => 'form-control')) !!}
                        </div>
                        <div class="col-sm-6">
                            <p><b>{{ trans('message.User_lname_en') }}</b></p>
                            {!! Form::text('lname_en', null, array('placeholder' => app()->getLocale() == 'en' ? 'Enter Last Name (English)' : (app()->getLocale() == 'th' ? 'กรอกนามสกุล (อังกฤษ)' : '输入姓氏（英语）'), 'class' => 'form-control')) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <p><b>{{ trans('message.User_fname_cn') }}</b></p>
                            {!! Form::text('fname_cn', null, array('placeholder' => app()->getLocale() == 'cn' ? '输入名字（中文）' : (app()->getLocale() == 'th' ? 'กรอกชื่อ (จีน)' : 'Enter First Name (Chinese)'), 'class' => 'form-control')) !!}
                        </div>
                        <div class="col-sm-6">
                            <p><b>{{ trans('message.User_lname_cn') }}</b></p>
                            {!! Form::text('lname_cn', null, array('placeholder' => app()->getLocale() == 'cn' ? '输入姓氏（中文）' : (app()->getLocale() == 'th' ? 'กรอกนามสกุล (จีน)' : 'Enter Last Name (Chinese)'), 'class' => 'form-control')) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-8">
                            <p><b>{{ trans('message.User_email') }}</b></p>
                            {!! Form::text('email', null, array('placeholder' => app()->getLocale() == 'th' ? 'กรอกอีเมล' : (app()->getLocale() == 'en' ? 'Enter Email' : '输入电子邮件'), 'class' => 'form-control')) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <p><b>{{ trans('message.User_password') }}:</b></p>
                            {!! Form::password('password', array('placeholder' => app()->getLocale() == 'th' ? 'กรอกรหัสผ่าน' : (app()->getLocale() == 'en' ? 'Enter Password' : '输入密码'), 'class' => 'form-control')) !!}
                        </div>
                        <div class="col-sm-6">
                            <p><b>{{ trans('message.User_confirm_password') }}:</p></b>
                            {!! Form::password('password_confirmation', array('placeholder' => app()->getLocale() == 'th' ? 'ยืนยันรหัสผ่าน' : (app()->getLocale() == 'en' ? 'Confirm Password' : '确认密码'), 'class' => 'form-control')) !!}
                        </div>
                    </div>

                    <div class="form-group col-sm-8">
                        <p><b>{{ trans('message.User_role') }}:</b></p>
                        <div class="col-sm-8">
                            @php
                            $locale = app()->getLocale();
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

                            $placeholder = match($locale) {
                            'th' => 'กรุณาเลือกบทบาท',
                            'en' => 'Please select role',
                            'cn' => '请选择角色',
                            default => 'Please select role',
                            };
                            @endphp
                            {!! Form::select('roles[]', [null => $placeholder] + $roles_translated, null, ['class' => 'selectpicker', 'multiple']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <h6 for="category">{{ trans('message.User_department') }} <span class="text-danger">*</span></h6>
                                <select class="form-control" name="cat" id="cat" style="width: 100%;" required>
                                    <option>{{ trans('message.User_select_category') }}</option>
                                    @foreach ($departments as $cat)
                                    @php
                                    $locale = app()->getLocale();
                                    $departmentName = $locale == 'th' ? ($cat->department_name_th ?? $cat->department_name_en ?? $cat->department_name_cn) :
                                    ($locale == 'en' ? ($cat->department_name_en ?? $cat->department_name_th ?? $cat->department_name_cn) :
                                    ($locale == 'cn' ? ($cat->department_name_cn ?? $cat->department_name_en ?? $cat->department_name_th) :
                                    ($cat->department_name_en ?? $cat->department_name_th ?? $cat->department_name_cn)));
                                    @endphp
                                    <option value="{{ $cat->id }}">{{ $departmentName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <h6 for="subcat">{{ trans('message.User_program') }} <span class="text-danger">*</span></h6>
                                <select class="form-control select2" name="sub_cat" id="subcat" required>
                                    <option value="">{{ trans('message.User_select_sub_category') }}</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ trans('message.Submit_button') }}</button>
                    <a class="btn btn-secondary" href="{{ route('users.index') }}">{{ trans('message.Cancle_button') }}</a>
                    {!! Form::close() !!}
                </div>
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