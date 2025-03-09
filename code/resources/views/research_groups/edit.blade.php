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
            <h4 class="card-title">{{ trans('message.Edit_research_group') }}</h4>
            <p class="card-description">{{ trans('message.Edit_research_group_detail') }}</p>
            <form action="{{ route('researchGroups.update',$researchGroup->id) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <p class="col-sm-3 "><b>{{ trans('message.Research_group_name_th') }}</b></p>
                    <div class="col-sm-8">
                        <input name="group_name_th" value="{{ $researchGroup->group_name_th }}" class="form-control"
                            placeholder="{{ trans('message.Research_group_name_th') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 "><b>{{ trans('message.Research_group_name_en') }}</b></p>
                    <div class="col-sm-8">
                        <input name="group_name_en" value="{{ $researchGroup->group_name_en }}" class="form-control"
                            placeholder="{{ trans('message.Research_group_name_en') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 "><b>{{ trans('message.Research_group_name_cn') }}</b></p>
                    <div class="col-sm-8">
                        <input name="group_name_en" value="{{ $researchGroup->group_name_cn }}" class="form-control"
                            placeholder="{{ trans('message.Research_group_name_cn') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.Research_group_description_th') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_desc_th" value="{{ $researchGroup->group_desc_th }}" class="form-control"
                            style="height:90px">{{ $researchGroup->group_desc_th }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.Research_group_description_en') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_desc_en" value="{{ $researchGroup->group_desc_en }}" class="form-control"
                            style="height:90px">{{ $researchGroup->group_desc_en }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.Research_group_description_cn') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_desc_en" value="{{ $researchGroup->group_desc_cn }}" class="form-control"
                            style="height:90px">{{ $researchGroup->group_desc_cn }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.Research_group_detail_th') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_detail_th" value="{{ $researchGroup->group_detail_th }}" class="form-control"
                            style="height:90px">{{ $researchGroup->group_detail_th }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.Research_group_detail_en') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_detail_en" value="{{ $researchGroup->group_detail_en }}" class="form-control"
                            style="height:90px">{{ $researchGroup->group_detail_en }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.Research_group_detail_cn') }}</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_detail_en" value="{{ $researchGroup->group_detail_cn }}" class="form-control"
                            style="height:90px">{{ $researchGroup->group_detail_cn }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.Research_group_image') }}</b></p>
                    <div class="col-sm-8">
                        <input type="file" name="group_image" class="form-control" >
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>{{ trans('message.Research_group_head') }}</b></p>
                    <div class="col-sm-8">
                        <select id='head0' name="head">
                            @foreach($researchGroup->user as $u)
                            @if($u->pivot->role == 1)
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}" @if($u->id == $user->id) selected @endif>
                                        @php
                                        $locale = app()->getLocale();
                                        $fname = $locale == 'en' ? ($user->fname_en ?? $user->fname_th ?? $user->fname_cn)
                                                : ($locale == 'th' ? ($user->fname_th ?? $user->fname_en ?? $user->fname_cn)
                                                : ($user->fname_cn ?? $user->fname_en ?? $user->fname_th));

                                        $lname = $locale == 'en' ? ($user->lname_en ?? $user->lname_th ?? $user->lname_cn)
                                                : ($locale == 'th' ? ($user->lname_th ?? $user->lname_en ?? $user->lname_cn)
                                                : ($user->lname_cn ?? $user->lname_en ?? $user->lname_th));
                                    @endphp
                                    {{ $fname }} {{ $lname }}
                                    </option>
                                    @endforeach
                            @endif
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
                
                <button type="submit" class="btn btn-primary mt-5">{{ trans('message.Submit_button') }}</button>
                <a class="btn btn-light mt-5" href="{{ route('researchGroups.index') }}"> {{ trans('message.Cancle_button') }}</a>
            </form>
        </div>
    </div>
</div>
@stop
@section('javascript')

<script>
$(document).ready(function() {
    $("#head0").select2()
    $("#fund").select2()


    var researchGroup = <?php echo $researchGroup['user']; ?>;
    var i = 0;

    for (i = 0; i < researchGroup.length; i++) {
        var obj = researchGroup[i];

        if (obj.pivot.role === 2) {
            $("#dynamicAddRemove").append(`
                <tr>
                    <td>
                    <select id="selUser${i}" name="moreFields[${i}][userid]" style="width: 200px;">
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            @php
                                        $locale = app()->getLocale();
                                        $fname = $locale == 'en' ? ($user->fname_en ?? $user->fname_th ?? $user->fname_cn)
                                                : ($locale == 'th' ? ($user->fname_th ?? $user->fname_en ?? $user->fname_cn)
                                                : ($user->fname_cn ?? $user->fname_en ?? $user->fname_th));

                                        $lname = $locale == 'en' ? ($user->lname_en ?? $user->lname_th ?? $user->lname_cn)
                                                : ($locale == 'th' ? ($user->lname_th ?? $user->lname_en ?? $user->lname_cn)
                                                : ($user->lname_cn ?? $user->lname_en ?? $user->lname_th));
                                    @endphp
                            {{ $fname }} {{ $lname }}
                        </option>
                        @endforeach
                    </select>
                    </td>
                    <td>
                    <button type="button" class="btn btn-danger btn-sm remove-tr">
                        <i class="mdi mdi-minus"></i>
                    </button>
                    </td>
                </tr>
                `);
            document.getElementById("selUser" + i).value = obj.id;
            $("#selUser" + i).select2()

        }
        //document.getElementById("#dynamicAddRemove").value = "10";
    }
    $("#add-btn2").click(function() {
        ++i;
        $("#dynamicAddRemove").append(`
                <tr>
                    <td>
                    <select id="selUser${i}" name="moreFields[${i}][userid]" style="width: 200px;">
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            @php
                                        $locale = app()->getLocale();
                                        $fname = $locale == 'en' ? ($user->fname_en ?? $user->fname_th ?? $user->fname_cn)
                                                : ($locale == 'th' ? ($user->fname_th ?? $user->fname_en ?? $user->fname_cn)
                                                : ($user->fname_cn ?? $user->fname_en ?? $user->fname_th));

                                        $lname = $locale == 'en' ? ($user->lname_en ?? $user->lname_th ?? $user->lname_cn)
                                                : ($locale == 'th' ? ($user->lname_th ?? $user->lname_en ?? $user->lname_cn)
                                                : ($user->lname_cn ?? $user->lname_en ?? $user->lname_th));
                                    @endphp
                            {{ $fname }} {{ $lname }}
                        </option>
                        @endforeach
                    </select>
                    </td>
                    <td>
                    <button type="button" class="btn btn-danger btn-sm remove-tr">
                        <i class="mdi mdi-minus"></i>
                    </button>
                    </td>
                </tr>
                `);
        $("#selUser" + i).select2()

    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });

});
</script>
@stop