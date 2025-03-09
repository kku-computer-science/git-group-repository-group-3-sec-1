@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card col-md-10" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ trans('message.Research_group_detail') }}</h4>
            <p class="card-description">{{ trans('message.Research_group_description') }}</p>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_group_name') }}</b></p>
                <p class="card-text col-sm-9">
                    @php
                                        $locale = app()->getLocale();
                                        $groupname = $locale == 'en' ? ($researchGroup->group_name_en ?? $researchGroup->group_name_th ?? $researchGroup->group_name_cn)
                                                : ($locale == 'th' ? ($researchGroup->group_name_th ?? $researchGroup->group_name_en ?? $researchGroup->group_name_cn)
                                                : ($researchGroup->group_name_cn ?? $researchGroup->group_name_en ?? $researchGroup->group_name_th));
                                    @endphp
                                    {{ $groupname }}
                </p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_group_description') }}</b></p>
                <p class="card-text col-sm-9">
                    @php
                                        $locale = app()->getLocale();
                                        $groupdesc = $locale == 'en' ? ($researchGroup->group_desc_en ?? $researchGroup->group_desc_th ?? $researchGroup->group_desc_cn)
                                                : ($locale == 'th' ? ($researchGroup->group_desc_th ?? $researchGroup->group_desc_en ?? $researchGroup->group_desc_cn)
                                                : ($researchGroup->group_desc_cn ?? $researchGroup->group_desc_en ?? $researchGroup->group_desc_th));
                                    @endphp
                                    {{ $groupdesc }}
                </p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_group_detail') }}</b></p>
                <p class="card-text col-sm-9">
                    @php
                                        $locale = app()->getLocale();
                                        $groupdetail = $locale == 'en' ? ($researchGroup->group_detail_en ?? $researchGroup->group_detail_th ?? $researchGroup->group_detail_cn)
                                                : ($locale == 'th' ? ($researchGroup->group_detail_th ?? $researchGroup->group_detail_en ?? $researchGroup->group_detail_cn)
                                                : ($researchGroup->group_detail_cn ?? $researchGroup->group_detail_en ?? $researchGroup->group_detail_th));
                                    @endphp
                                    {{ $groupdetail }}
                </p>
            </div>
            <div class="row mt-3">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_group_head') }}</b></p>
                <p class="card-text col-sm-9">
                    @foreach($researchGroup->user as $user)
                    @if ( $user->pivot->role == 1)
                                    @php
                                        $locale = app()->getLocale();
                                        $fname = $locale == 'en' ? ($user->fname_en ?? $user->fname_th ?? $user->fname_cn)
                                                : ($locale == 'th' ? ($user->fname_th ?? $user->fname_en ?? $user->fname_cn)
                                                : ($user->fname_cn ?? $user->fname_en ?? $user->fname_th));

                                        $lname = $locale == 'en' ? ($user->lname_en ?? $user->lname_th ?? $user->lname_cn)
                                                : ($locale == 'th' ? ($user->lname_th ?? $user->lname_en ?? $user->lname_cn)
                                                : ($user->lname_cn ?? $user->lname_en ?? $user->lname_th));
                                        $position = $locale == 'en' ? ($user->position_en ?? $user->position_th ?? $user->position_cn)
                                                : ($locale == 'th' ? ($user->position_th ?? $user->position_en ?? $user->position_cn)
                                                : ($user->position_cn ?? $user->position_en ?? $user->position_th));
                                    @endphp
                                    {{ $position }} {{ $fname }} {{ $lname }}
                    @endif
                    @endforeach   </p>
            </div>
            <div class="row mt-1">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_group_member') }}</b></p>
                <p class="card-text col-sm-9">
                    @foreach($researchGroup->user as $user)
                    @if ( $user->pivot->role == 2)
                                    @php
                                        $locale = app()->getLocale();
                                        $fname = $locale == 'en' ? ($user->fname_en ?? $user->fname_th ?? $user->fname_cn)
                                                : ($locale == 'th' ? ($user->fname_th ?? $user->fname_en ?? $user->fname_cn)
                                                : ($user->fname_cn ?? $user->fname_en ?? $user->fname_th));

                                        $lname = $locale == 'en' ? ($user->lname_en ?? $user->lname_th ?? $user->lname_cn)
                                                : ($locale == 'th' ? ($user->lname_th ?? $user->lname_en ?? $user->lname_cn)
                                                : ($user->lname_cn ?? $user->lname_en ?? $user->lname_th));
                                        $position = $locale == 'en' ? ($user->position_en ?? $user->position_th ?? $user->position_cn)
                                                : ($locale == 'th' ? ($user->position_th ?? $user->position_en ?? $user->position_cn)
                                                : ($user->position_cn ?? $user->position_en ?? $user->position_th));
                                    @endphp
                                    {{ $position }} {{ $fname }} {{ $lname }} //
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