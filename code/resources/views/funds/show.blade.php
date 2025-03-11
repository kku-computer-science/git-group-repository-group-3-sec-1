@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
    <div class="container">
        <div class="card col-md-8" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">{{ trans('message.Fund_detail') }}</h4>
                <p class="card-description">{{ trans('message.Fund_detail_description') }}</p>
                <div class="row">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Fund_name') }}</b></p>
                    <p class="card-text col-sm-9">
                        @if (App::getLocale() == 'th')
                            {{ $fund->fund_name_th }}
                        @elseif (App::getLocale() == 'en')
                            {{ $fund->fund_name_en }}
                        @elseif (App::getLocale() == 'cn')
                            {{ $fund->fund_name_cn }}
                        @else
                            {{ $fund->fund_name }} {{-- ค่าเริ่มต้น --}}
                        @endif
                    </p>

                </div>
                <div class="row">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Fund_year') }}</b></p>
                    <p class="card-text col-sm-9">{{ $fund->fund_year }}</p>
                </div>
                <div class="row">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Fund_detail') }}</b></p>
                    <p class="card-text col-sm-9">{{ $fund->fund_details }}</p>
                </div>
                <div class="row">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Fund_type') }}</b></p>
                    <p class="card-text col-sm-9">
                        @if (App::getLocale() == 'th')
                            @if ($fund->fund_type == 'ทุนภายใน')
                                {{ trans('message.internal_fund') }}
                            @elseif($fund->fund_type == 'ทุนภายนอก')
                                {{ trans('message.external_fund') }}
                            @endif
                        @elseif(App::getLocale() == 'en')
                            @if ($fund->fund_type == 'ทุนภายใน')
                                {{ trans('message.internal_fund') }}
                            @elseif($fund->fund_type == 'ทุนภายนอก')
                                {{ trans('message.external_fund') }}
                            @endif
                        @elseif(App::getLocale() == 'cn')
                            @if ($fund->fund_type == 'ทุนภายใน')
                                {{ trans('message.internal_fund') }}
                            @elseif($fund->fund_type == 'ทุนภายนอก')
                                {{ trans('message.external_fund') }}
                            @endif
                        @endif
                    </p>
                </div>
                <div class="row">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Fund_level') }}</b></p>
                    <p class="card-text col-sm-9">{{ $fund->fund_level }}</p>
                </div>
                <div class="row">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Fund_organization') }}</b></p>
                    <p class="card-text col-sm-9">
                        @if (App::getLocale() == 'th')
                            {{ $fund->fund_name_th }}
                        @elseif (App::getLocale() == 'en')
                            {{ $fund->fund_name_en }}
                        @elseif (App::getLocale() == 'cn')
                            {{ $fund->fund_name_cn }}
                        @else
                            {{ $fund->fund_name }} {{-- ค่าเริ่มต้น --}}
                        @endif
                    </p>

                </div>
                <div class="row">
                    <p class="card-text col-sm-3"><b>{{ trans('message.Add_detail_fund_by') }}</b></p>
                    @if (App::getLocale() == 'th')
                    <p class="card-text col-sm-9">{{ $fund->user->fname_th }} {{ $fund->user->lname_th }}</p>
                    @elseif (App::getLocale() == 'en')
                    <p class="card-text col-sm-9">{{ $fund->user->fname_en }} {{ $fund->user->lname_en }}</p>
                    @elseif (App::getLocale() == 'cn')
                    <p class="card-text col-sm-9">{{ $fund->user->fname_cn }} {{ $fund->user->lname_cn }}</p>
                    @endif
                </div>
                <div class="pull-right mt-5">
                    <a class="btn btn-primary btn-sm" href="{{ route('funds.index') }}">
                        {{ trans('message.Back_button') }}</a>
                </div>
            </div>

        </div>


    </div>
@endsection
