@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card col-md-8" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ trans('message.Book_detail') }}</h4>
            <p class="card-description">{{ trans('message.Book_description') }}</p>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('message.Book_title') }}</b></p>
                <p class="card-text col-sm-9">
                    @if (App::getLocale() == 'th')
                        {{ Str::limit($paper->ac_name, 50) }}
                    @elseif(App::getLocale() == 'en')
                        @if ($paper->ac_name_en)
                            {{ Str::limit($paper->ac_name_en, 50) }}
                        @else
                            {{ Str::limit($paper->ac_name, 50) }}
                            <br>
                            <span class="text-danger">*This book doesn't have an english title.</span><br>
                        @endif
                    @elseif(App::getLocale() == 'cn')
                        @if ($paper->ac_name_cn)
                            {{ Str::limit($paper->ac_name_cn, 50) }}
                        @else
                            {{ Str::limit($paper->ac_name, 50) }}
                            <br>
                            <span class="text-danger">*这本书没有英文标题</span><br>
                        @endif
                    @endif
                </p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('message.Book_year') }}</b></p>
                @if(app()->getLocale() == 'th')
                <p class="card-text col-sm-9">{{  date('Y', strtotime($paper->ac_year))+543 }}</p>
                @else
                <p class="card-text col-sm-9">{{  date('Y', strtotime($paper->ac_year))}}</p>
                @endif
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('message.Book_source') }}</b></p>
                @if(app()->getLocale() == 'en')
                <p class="card-text col-sm-9">{{ $paper->ac_sourcetitle_en}}</p>
                @elseif(app()->getLocale() == 'th')
                <p class="card-text col-sm-9">{{ $paper->ac_sourcetitle }}</p>
                @elseif(app()->getLocale() == 'cn')
                <p class="card-text col-sm-9">{{ $paper->ac_sourcetitle_cn}}</p>
                @endif
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('message.Book_page') }}</b></p>
                <p class="card-text col-sm-9">{{ $paper->ac_page }}</p>
            </div>

            <div class="pull-right mt-5">
                <a class="btn btn-primary btn-sm" href="{{ route('books.index') }}"> {{ trans('message.Back_button') }}</a>
            </div>
        </div>

    </div>


</div>
@endsection