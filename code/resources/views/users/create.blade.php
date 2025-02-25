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
                            {!! Form::text('fname_th', null, array('placeholder' => 'fname_th','class' =>
                            'form-control')) !!}
                        </div>
                        <div class="col-sm-6">
                            <p><b>{{ trans('message.User_lname_th') }}</b></p>
                            {!! Form::text('lname_th', null, array('placeholder' => 'lname_th','class' =>
                            'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <p><b>{{ trans('message.User_fname_en') }}</b></p>
                            {!! Form::text('fname_en', null, array('placeholder' => 'fname_en','class' =>
                            'form-control')) !!}
                        </div>
                        <div class="col-sm-6">
                            <p><b>{{ trans('message.User_lname_en') }}</b></p>
                            {!! Form::text('lname_en', null, array('placeholder' => 'lname_en','class' =>
                            'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <p><b>{{ trans('message.User_fname_cn') }}</b></p>
                            {!! Form::text('fname_cn', null, array('placeholder' => 'fname_cn','class' =>
                            'form-control')) !!}
                        </div>
                        <div class="col-sm-6">
                            <p><b>{{ trans('message.User_lname_cn') }}</b></p>
                            {!! Form::text('lname_cn', null, array('placeholder' => 'lname_cn','class' =>
                            'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-8">
                            <p><b>{{ trans('message.User_email') }}</b></p>
                            {!! Form::text('email', null, array('placeholder' => 'email','class' => 'form-control'))!!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <p><b>{{ trans('message.User_passwrord') }}:</b></p>
                            {!! Form::password('password', array('placeholder' => 'password','class' => 'form-control'))!!}
                        </div>
                        <div class="col-sm-6">
                            <p><b>{{ trans('message.User_confirm_password') }}:</p></b>
                            {!! Form::password('password_confirmation', array('placeholder' => 'password_confirmation','class' =>'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group col-sm-8">
                    <p><b>{{ trans('message.User_role') }}:</b></p>
                        <div class="col-sm-8">
                            
                            {!! Form::select('roles[]', $roles,[],  array('class' => 'selectpicker','multiple')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <h6 for="category">{{ trans('message.User_department') }} <span class="text-danger">*</span></h6>
                                <select class="form-control" name="cat" id="cat" style="width: 100%;" required>
                                    <option>{{ trans('message.User_select_category') }}</option>
                                    @foreach ($departments as $cat)
                                    <option value="{{$cat->id}}">{{ $cat->department_name_en }}</option>
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