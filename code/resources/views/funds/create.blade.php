@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<style>
    .my-select {
        background-color: #fff;
        color: #212529;
        border: #000 0.2 solid;
        border-radius: 10px;
        padding: 4px 10px;
        width: 100%;
        font-size: 14px;
    }
</style>
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
    <!-- <a class="btn btn-primary" href="{{ route('funds.index') }}"> Back </a> -->
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ trans('message.Add_research_fund') }}</h4>
                <p class="card-description">{{ trans('message.Input_research_fund_detail') }}</p>
                <form class="forms-sample" action="{{ route('funds.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputfund_type" class="col-sm-2 ">{{ trans('message.Fund_type') }}</label>
                        <div class="col-sm-4">
                            <select name="fund_type" class="custom-select my-select" id="fund_type" onchange='toggleDropdown(this);' required>
                                <option value="" disabled selected >---- {{ trans('message.Please_choose_fund_type') }} ----</option>
                                <option value="ทุนภายใน">{{ trans('message.internal_fund') }}</option>
                                <option value="ทุนภายนอก">{{ trans('message.external_fund') }}</option>
                            </select>
                        </div>
                    </div>
                    <div id="fund_code">
                        <div class="form-group row">
                            <label for="exampleInputfund_level" class="col-sm-2 ">{{ trans('message.Fund_level') }}</label>
                            <div class="col-sm-4">
                                <select name="fund_level" class="custom-select my-select">
                                <option value="" disabled selected >---- {{ trans('message.Please_choose_fund_level') }} ----</option>
                                    <option value="">{{ trans('message.Fund_level_not_define') }}</option>
                                    <option value="สูง">{{ trans('message.Fund_level_low') }}</option>
                                    <option value="กลาง">{{ trans('message.Fund_level_medium') }}</option>
                                    <option value="ล่าง">{{ trans('message.Fund_level_high') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputfund_name" class="col-sm-2 ">{{ trans('message.Fund_name_th') }}</label>
                        <div class="col-sm-8">
                            <input type="text" name="fund_name" class="form-control" placeholder="{{ trans('message.Fund_name_th') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputfund_name" class="col-sm-2 ">{{ trans('message.Fund_name_en') }}</label>
                        <div class="col-sm-8">
                            <input type="text" name="fund_name2" class="form-control" placeholder="{{ trans('message.Fund_name_en') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputfund_name" class="col-sm-2 ">{{ trans('message.Fund_name_cn') }}</label>
                        <div class="col-sm-8">
                            <input type="text" name="fund_name2" class="form-control" placeholder="{{ trans('message.Fund_name_cn') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="exampleInputsupport_resource" class="col-sm-2 ">{{ trans('message.Organization_support') }} </label>
                        <div class="col-sm-8">
                            <input type="text" name="support_resource" class="form-control" placeholder="{{ trans('message.Organization_support') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputsupport_resource" class="col-sm-2 ">{{ trans('message.Organization_support_en') }} </label>
                        <div class="col-sm-8">
                            <input type="text" name="support_resource_en" class="form-control" placeholder="{{ trans('message.Organization_support_en') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputsupport_resource" class="col-sm-2 ">{{ trans('message.Organization_support_cn') }} </label>
                        <div class="col-sm-8">
                            <input type="text" name="support_resource_cn" class="form-control" placeholder="{{ trans('message.Organization_support_cn') }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">{{ trans('message.Submit_button') }}</button>
                    <a class="btn btn-light" href="{{ route('funds.index')}}">{{ trans('message.Cancle_button') }}</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const ac = document.getElementById("fund_code");
    //ac.style.display = "none";

    function toggleDropdown(selObj) {
        ac.style.display = selObj.value === "ทุนภายใน" ? "block" : "none";
    }
</script>
@endsection