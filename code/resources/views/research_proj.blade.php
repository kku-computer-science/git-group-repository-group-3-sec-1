@extends('layouts.layout')
@section('content')

<div class="container refund">
    <p>{{ trans('message.Academic service projects/research projects') }}</p>

    <div class="table-refund table-responsive">
        <table id="example1" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th style="font-weight: bold;">{{ trans('message.Number') }}</th>
                    <th class="col-md-1" style="font-weight: bold;">{{ trans('message.Year') }}</th>
                    <th class="col-md-4" style="font-weight: bold;">{{ trans('message.Research_project_name') }}</th>
                    <!-- <th>ระยะเวลาโครงการ</th>
                    <th>ผู้รับผิดชอบโครงการ</th>
                    <th>ประเภททุนวิจัย</th>
                    <th>หน่วยงานที่สนันสนุนทุน</th>
                    <th>งบประมาณที่ได้รับจัดสรร</th> -->
                    <th class="col-md-4" style="font-weight: bold;">{{ trans('message.Details') }}</th>
                    <th class="col-md-2" style="font-weight: bold;">{{ trans('message.Project responsible person') }}</th>
                    <!-- <th class="col-md-5">หน่วยงานที่รับผิดชอบ</th> -->
                    <th class="col-md-1" style="font-weight: bold;">{{ trans('message.Status') }}</th>
                </tr>
            </thead>

            
            <tbody>
                @foreach($resp as $i => $re)
                <tr>
                    <td style="vertical-align: top;text-align: left;">{{$i+1}}</td>
                    @if(app()->getLocale() == 'th')
                    <td style="vertical-align: top;text-align: left;">{{($re->project_year)+543}}</td>
                    @else
                    <td style="vertical-align: top;text-align: left;">{{($re->project_year)}}</td>
                    @endif
                    
                    <td style="vertical-align: top;text-align: left;">
                        @php
                                        $locale = app()->getLocale();
                                        $project_name = $locale == 'en' ? ($re->project_name_en ?? $re->project_name ?? $re->project_name_cn)
                                                : ($locale == 'th' ? ($re->project_name ?? $re->project_name_en ?? $re->project_name_cn)
                                                : ($re->project_name_cn ?? $re->project_name_en ?? $re->project_name));
                                    @endphp
                        {{$project_name}}

                    </td>
                    <td>
                        <div style="padding-bottom: 10px">

                            
                            <span style="font-weight: bold;">
                                {{ trans('message.Project Duration') }}
                            </span>
                            @if ($re->project_start != null)
                            <span style="padding-left: 10px;">
                                @if(app()->getLocale() == 'th')
                                {{\Carbon\Carbon::parse($re->project_start)->thaidate('j F Y') }} ถึง {{\Carbon\Carbon::parse($re->project_end)->thaidate('j F Y') }}
                                @elseif(app()->getLocale() == 'en')
                                {{ \Carbon\Carbon::parse($re->project_start)->format('d/m/Y') }} to {{ \Carbon\Carbon::parse($re->project_end)->format('d/m/Y') }}
                                @elseif(app()->getLocale() == 'cn')
                                {{ \Carbon\Carbon::parse($re->project_start)->format('Y年m月d日') }} 到 {{ \Carbon\Carbon::parse($re->project_end)->format('Y年m月d日') }}
                                @endif
                            </span>
                            @else
                            <span style="padding-left: 10px;">
                                {{ trans('message.null') }}
                            </span>
                            @endif
                        </div>


                        <!-- @if ($re->project_start != null)
                    <td>{{\Carbon\Carbon::parse($re->project_start)->thaidate('j F Y') }}<br>ถึง {{\Carbon\Carbon::parse($re->project_end)->thaidate('j F Y') }}</td>
                    @else
                    <td></td>
                    @endif -->

                        <!-- <td>@foreach($re->user as $user)
                        {{$user->position }}{{$user->fname_th}} {{$user->lname_th}}<br>
                        @endforeach
                    </td> -->
                        <!-- <td>
                        @if(is_null($re->fund))
                        @else
                        {{$re->fund->fund_type}}
                        @endif
                    </td> -->
                        <!-- <td>@if(is_null($re->fund))
                        @else
                        {{$re->fund->support_resource}}
                        @endif
                    </td> -->
                        <!-- <td>{{$re->budget}}</td> -->
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">{{ trans('message.Type of Research Funding') }}</span>
                            <span style="padding-left: 10px;"> @if(is_null($re->fund))
                                {{ trans('message.null') }}                                
                                @else
                                @php
                                        $locale = app()->getLocale();
                                        $fundtype = $locale == 'en' ? ($re->fund->fund_type_en ?? $re->fund->fund_type ?? $re->fund->fund_type_cn)
                                                : ($locale == 'th' ? ($re->fund->fund_type ?? $re->fund->fund_type_en ?? $re->fund->fund_type_cn)
                                                : ($re->fund->fund_type_cn ?? $re->fund->fund_type_en ?? $re->fund->fund_type));
                                    @endphp
                                {{$fundtype}}
                                @endif</span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">{{ trans('message.Funding Agency') }}</span>
                            <span style="padding-left: 10px;"> @if(is_null($re->fund))
                                {{ trans('message.null') }}
                                @else
                                @php
                                        $locale = app()->getLocale();
                                        $supportResource = $locale == 'en' ? ($re->fund->support_resource_en ?? $re->fund->support_resource ?? $re->fund->support_resource_cn)
                                                : ($locale == 'th' ? ($re->fund->support_resource ?? $re->fund->support_resource_en ?? $re->fund->support_resource_cn)
                                                : ($re->fund->support_resource_cn ?? $re->fund->support_resource_en ?? $re->fund->support_resource));
                                    @endphp
                                {{$supportResource}}
                                @endif</span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">{{ trans('message.Responsible Agency') }}</span>
                            <span style="padding-left: 10px;">
                                @php
                                        $locale = app()->getLocale();
                                        $department = $locale == 'en' ? ($re->responsible_department_en ?? $re->responsible_department ?? $re->responsible_department_cn)
                                                : ($locale == 'th' ? ($re->responsible_department ?? $re->responsible_department_en ?? $re->responsible_department_cn)
                                                : ($re->responsible_department_cn ?? $re->responsible_department_en ?? $re->responsible_department));
                                    @endphp
                                {{$department}}
                            </span>
                        </div>
                        <div style="padding-bottom: 10px;">

                            <span style="font-weight: bold;">{{ trans('message.Allocated Budget') }}</span>
                            @if(app()->getLocale() == 'th')
                            <span style="padding-left: 10px;"> {{number_format($re->budget)}} บาท</span>
                            @elseif(app()->getLocale() == 'cn')
                            <span style="padding-left: 10px;"> {{number_format($re->budget)}} 铢</span>
                            @else
                            <span style="padding-left: 10px;"> {{number_format($re->budget)}} Bath</span>
                            @endif
                        </div>
                    </td>

                    <td style="vertical-align: top;text-align: left;">
                        <div style="padding-bottom: 10px;">
                            <span>@foreach($re->user as $user)
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
                                    {{ $position }} {{ $fname }} {{ $lname }}<br>
                                @endforeach</span>
                        </div>
                    </td>
                    @if($re->status == 1)
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge badge-success">{{ trans('message.Submit a Request') }}</label></h6>
                    </td>
                    @elseif($re->status == 2)
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge bg-warning text-dark">{{ trans('message.Proceed') }}</label></h6>
                    </td>
                    @else
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge bg-dark">{{ trans('message.Project Closed') }}</label>
                            <h6>
                    </td>
                    @endif
                    <!-- <td></td>
                    <td></td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    


</div>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>
    $(document).ready(function() {
        var table1 = $('#example1').DataTable({
            responsive: true,
            language: {
                "emptyTable": "{{ trans('message.No_data_avalible') }}",
                "info": "{{ trans('message.info') }}",
                "infoEmpty": "{{ trans('message.infoEmpty') }}",
                "infoFiltered": "{{ trans('message.infoFiltered') }}",    
                "lengthMenu": "{{ trans('message.lengthMenu') }}",            
                "search": "{{ trans('message.search') }}",
                "paginate": {                    
                    "next": "{{ trans('message.Next') }}",
                    "previous": "{{ trans('message.Previous') }}"
                }
            }
        });
    });
</script>
@stop