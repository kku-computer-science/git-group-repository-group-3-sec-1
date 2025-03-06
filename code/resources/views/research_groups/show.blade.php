@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card col-md-10" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ trans('message.Research_group_detail') }}</h4>
            <p class="card-description">{{ trans('message.Research_group_description') }}</p>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_group_name_th') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_name_th }}</p>
            </div>
            <div class="row mt-1">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_group_name_en') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_name_en }}</p>
            </div>
            <div class="row mt-1">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_group_name_cn') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_name_cn }}</p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_group_description_th') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_desc_th }}</p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_group_description_en') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_desc_en }}</p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_group_description_cn') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_desc_cn }}</p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_group_detail_th') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_detail_th }}</p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_group_detail_en') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_detail_en }}</p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_group_detail_cn') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_detail_cn }}</p>
            </div>
            <div class="row mt-3">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_group_head') }}</b></p>
                <p class="card-text col-sm-9">
                    @foreach($researchGroup->user as $user)
                    @if ( $user->pivot->role == 1)
                                    @if(App::getLocale() == 'en')
                                        {{$user->position_en}} {{ $user->fname_en}} {{ $user->lname_en}}
                                    @elseif(App::getLocale() == 'th')
                                        {{$user->position_th}} {{ $user->fname_th}} {{ $user->lname_th}}
                                    @elseif(App::getLocale() == 'cn')
                                        {{$user->position_cn}} {{ $user->fname_cn}} {{ $user->lname_cn}}
                                    @endif
                    @endif
                    @endforeach   </p>
            </div>
            <div class="row mt-1">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_group_member') }}</b></p>
                <p class="card-text col-sm-9">
                    @foreach($researchGroup->user as $user)
                    @if ( $user->pivot->role == 2)
                                    @if(App::getLocale() == 'en')
                                        {{$user->position_en}} {{ $user->fname_en}} {{ $user->lname_en}}
                                    @elseif(App::getLocale() == 'th')
                                        {{$user->position_th}} {{ $user->fname_th}} {{ $user->lname_th}}
                                    @elseif(App::getLocale() == 'cn')
                                        {{$user->position_cn}} {{ $user->fname_cn}} {{ $user->lname_cn}}
                                    @endif
                    @endif
                    @endforeach</p>
            </div>
            <a class="btn btn-primary mt-5" href="{{ route('researchGroups.index') }}"> {{ trans('message.Back_button') }}</a>
        </div>
    </div>
    
@stop
@section('javascript')
<script>
$(document).ready(function() {

    /* When click New customer button */
    $('#new-customer').click(function() {
        $('#btn-save').val("create-customer");
        $('#customer').trigger("reset");
        $('#customerCrudModal').html("Add New Customer EiEi");
        $('#crud-modal').modal('show');
    });
    /* When click New customer button */
    $('#new-customer2').click(function() {
        $('#btn-save').val("create-customer");
        $('#customer').trigger("reset");
        $('#customerCrudModal').html("Add New Customer EiEi");
        $('#crud-modal').modal('show');
    });
});
</script>

@stop