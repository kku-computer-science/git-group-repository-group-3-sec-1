@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{ trans('message.error_input.Whoops') }}</strong> {{ trans('message.error_input.Error_problem') }}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ trans('message.Create_research_group') }}</h4>
            <p class="card-description">{{ trans('message.Input_research_group_detail') }}</p>
            <form action="{{ route('researchGroups.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <p class="col-sm-3 "><b>{{ trans('message.Research_group_name_th') }}</b></p>
                    <div class="col-sm-8">
                        <input name="group_name_th" value="{{ old('group_name_th') }}" class="form-control"
                            placeholder="{{ trans('message.Research_group_name_th') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 "><b>{{ trans('message.Research_group_name_en') }}</b></p>
                    <div class="col-sm-8">
                        <input name="group_name_en" value="{{ old('group_name_en') }}" class="form-control"
                            placeholder="{{ trans('message.Research_group_name_en') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 "><b>{{ trans('message.Research_group_name_cn') }}</b></p>
                    <div class="col-sm-8">
                        <input name="group_name_en" value="{{ old('group_name_cn') }}" class="form-control"
                            placeholder="{{ trans('message.Research_group_name_cn') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.Research_group_description_th') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_desc_th" value="{{ old('group_desc_th') }}" class="form-control"
                            style="height:90px"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.Research_group_description_en') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_desc_en" value="{{ old('group_desc_en') }}" class="form-control"
                            style="height:90px"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.Research_group_description_cn') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_desc_cn" value="{{ old('group_desc_cn') }}" class="form-control"
                            style="height:90px"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.Research_group_detail_th') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_detail_th" value="{{ old('group_detail_th') }}" class="form-control"
                            style="height:90px"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.Research_group_detail_en') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_detail_en" value="{{ old('group_detail_en') }}" class="form-control"
                            style="height:90px"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.Research_group_detail_cn') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_detail_cn" value="{{ old('group_detail_cn') }}" class="form-control"
                            style="height:90px"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.Research_group_image') }}</b></p>
                    <div class="col-sm-8">                        
                        <input type="file" name="group_image" class="form-control" value="{{ old('group_image') }}">                        
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.Research_group_head') }}</b></p>
                    <div class="col-sm-8">
                        <select id='head0' name="head">
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">
                                    @if(App::getLocale() == 'en')
                                        {{ $user->fname_en}} {{ $user->lname_en}}
                                    @elseif(App::getLocale() == 'th')
                                        {{ $user->fname_th}} {{ $user->lname_th}}
                                    @elseif(App::getLocale() == 'cn')
                                        {{ $user->fname_cn}} {{ $user->lname_cn}}
                                    @endif
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 pt-4"><b>{{ trans('message.Research_group_member') }}</b></p>
                    <div class="col-sm-8">
                        <table class="table" id="dynamicAddRemove">
                            <tr>
                                <th><button type="button" name="add" id="add-btn2" class="btn btn-success btn-sm add"><i
                                            class="mdi mdi-plus"></i></button></th>
                            </tr>
                        </table>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary upload">{{ trans('message.Submit_button') }}</button>
                <a class="btn btn-light" href="{{ route('researchGroups.index')}}"> {{ trans('message.Back_button') }}</a>
                </form>
        </div>
    </div>
</div>

@stop
@section('javascript')
<!-- <script type="text/javascript">
$("body").on("click",".upload",function(e){
    $(this).parents("form").ajaxForm(options);
  });


  var options = { 
    complete: function(response) 
    {
        if($.isEmptyObject(response.responseJSON.error)){
            // $("input[name='title']").val('');
            // alert('Image Upload Successfully.');
        }else{
            printErrorMsg(response.responseJSON.error);
        }
    }
  };


  function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
  }
</script> -->
@if(App::getLocale() == 'th')
<script>
$(document).ready(function() {
    $("#selUser0").select2()
    $("#head0").select2()

    var i = 0;

    $("#add-btn2").click(function() {

        ++i;
        $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
            '][userid]"  style="width: 200px;"><option value="">{{ trans('message.Select_user_option') }}</option>@foreach($users as $user)<option value="{{ $user->id }}">{{ $user->fname_th }} {{ $user->lname_th }}</option>@endforeach</select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="fas fa-minus"></i></button></td></tr>'
            );
        $("#selUser" + i).select2()
    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });

});
</script>
@elseif(App::getLocale() == 'en')
<script>
$(document).ready(function() {
    $("#selUser0").select2()
    $("#head0").select2()

    var i = 0;

    $("#add-btn2").click(function() {

        ++i;
        $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
            '][userid]"  style="width: 200px;"><option value="">{{ trans('message.Select_user_option') }}</option>@foreach($users as $user)<option value="{{ $user->id }}">{{ $user->fname_en }} {{ $user->lname_en }}</option>@endforeach</select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="fas fa-minus"></i></button></td></tr>'
            );
        $("#selUser" + i).select2()
    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });

});
</script>
@elseif(App::getLocale() == 'cn')
<script>
$(document).ready(function() {
    $("#selUser0").select2()
    $("#head0").select2()

    var i = 0;

    $("#add-btn2").click(function() {

        ++i;
        $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
            '][userid]"  style="width: 200px;"><option value="">{{ trans('message.Select_user_option') }}</option>@foreach($users as $user)<option value="{{ $user->id }}">{{ $user->fname_cn }} {{ $user->lname_cn }}</option>@endforeach</select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="fas fa-minus"></i></button></td></tr>'
            );
        $("#selUser" + i).select2()
    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });

});
</script>
@endif
@stop