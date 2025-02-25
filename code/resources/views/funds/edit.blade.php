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
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">{{ trans('message.Edit_fund') }}</h4>
                <p class="card-description">{{ trans('message.Edit_research_fund_detail') }}</p>
                <form class="forms-sample" action="{{ route('funds.update',$fund->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <p class="col-sm-3 "><b>{{ trans('message.Fund_type') }}</b></p>
                        <!-- <label for="exampleInputfund_type" class="col-sm-2 ">ประเภททุนวิจัย</label> -->
                        <div class="col-sm-4">
                            <select name="fund_type" class="custom-select my-select" id="fund_type" onchange='toggleDropdown(this);' required>
                                <option value="ทุนภายใน" {{ $fund->fund_type == 'ทุนภายใน' ? 'selected' : '' }}>{{ trans('message.internal_fund') }}</option>
                                <option value="ทุนภายนอก" {{ $fund->fund_type == 'ทุนภายนอก' ? 'selected' : '' }}>{{ trans('message.external_fund') }}</option>
                            </select>
                        </div>
                    </div>
                    <div id="fund_code">
                        <div class="form-group row">
                            <p class="col-sm-3"><b>{{ trans('message.Fund_level') }}</b></p>
                            <div class="col-sm-4">
                                <select name="fund_level" class="custom-select my-select">
                                    <option value=""{{ $fund->fund_level == '' ? 'selected' : '' }}>{{ trans('message.Fund_level_not_define') }}</option>
                                    <option value="สูง" {{ $fund->fund_level == 'สูง' ? 'selected' : '' }}>{{ trans('message.Fund_level_high') }}</option>
                                    <option value="กลาง" {{ $fund->fund_level == 'กลาง' ? 'selected' : '' }}>{{ trans('message.Fund_level_medium') }}</option>
                                    <option value="ล่าง" {{ $fund->fund_level == 'ล่าง' ? 'selected' : '' }}>{{ trans('message.Fund_level_low') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-3 "><b>{{ trans('message.Fund_name') }}</b></p>
                        <div class="col-sm-8">
                            <input type="text" name="fund_name" value="{{ $fund->fund_name }}" class="form-control" placeholder="{{ trans('message.Fund_name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-3 "><b>{{ trans('message.Organization_support') }}</b></p>
                        <div class="col-sm-8">
                            <input type="text" name="support_resource" value="{{ $fund->support_resource }}" class="form-control" placeholder="{{ trans('message.Organization_support') }}">
                        </div>
                        <p class="col-sm-3 "><b>{{ trans('message.Organization_support_en') }}</b></p>
                        <div class="col-sm-8">
                            <input type="text" name="support_resource" value="{{ $fund->support_resource_en }}" class="form-control" placeholder="{{ trans('message.Organization_support_en') }}">
                        </div>
                        <p class="col-sm-3 "><b>{{ trans('message.Organization_support_cn') }}</b></p>
                        <div class="col-sm-8">
                            <input type="text" name="support_resource" value="{{ $fund->support_resource_cn }}" class="form-control" placeholder="{{ trans('message.Organization_support_cn') }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">{{ trans('message.Submit_button') }}</button>
                    <a class="btn btn-light mt-5" href="{{ route('funds.index')}}">{{ trans('message.Cancle_button') }}</a>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
    const ac = document.getElementById("fund_code");
    const ab = document.getElementById("fund_type").value;
    //console.log(ab);
    if (ab === "ทุนภายนอก") {
        ac.style.display = "none";
    }

    //ac.style.display = "none";

    function toggleDropdown(selObj) {
        ac.style.display = selObj.value === "ทุนภายใน" ? "block" : "none";
    }
</script>
@endsection