@extends('layouts.layout')
@section('content')

<div class="container refund">
    @if(app()->getLocale() == 'th')
    <p>โครงการบริการวิชาการ/ โครงการวิจัย</p>

    <div class="table-refund table-responsive">
        <table id="example1" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th style="font-weight: bold;">ลำดับ</th>
                    <th class="col-md-1" style="font-weight: bold;">ปี</th>
                    <th class="col-md-4" style="font-weight: bold;">ชื่อโครงการ </th>
                    <!-- <th>ระยะเวลาโครงการ</th>
                    <th>ผู้รับผิดชอบโครงการ</th>
                    <th>ประเภททุนวิจัย</th>
                    <th>หน่วยงานที่สนันสนุนทุน</th>
                    <th>งบประมาณที่ได้รับจัดสรร</th> -->
                    <th class="col-md-4" style="font-weight: bold;">รายละเอียด</th>
                    <th class="col-md-2" style="font-weight: bold;">ผู้รับผิดชอบโครงการ</th>
                    <!-- <th class="col-md-5">หน่วยงานที่รับผิดชอบ</th> -->
                    <th class="col-md-1" style="font-weight: bold;">สถานะ</th>
                </tr>
            </thead>

            
            <tbody>
                @foreach($resp as $i => $re)
                <tr>
                    <td style="vertical-align: top;text-align: left;">{{$i+1}}</td>
                    <td style="vertical-align: top;text-align: left;">{{($re->project_year)+543}}</td>
                    <td style="vertical-align: top;text-align: left;">
                        {{$re->project_name}}

                    </td>
                    <td>
                        <div style="padding-bottom: 10px">

                            @if ($re->project_start != null)
                            <span style="font-weight: bold;">
                                ระยะเวลาโครงการ
                            </span>
                            <span style="padding-left: 10px;">
                                {{\Carbon\Carbon::parse($re->project_start)->thaidate('j F Y') }} ถึง {{\Carbon\Carbon::parse($re->project_end)->thaidate('j F Y') }}
                            </span>
                            @else
                            <span style="font-weight: bold;">
                                ระยะเวลาโครงการ
                            </span>
                            <span>

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
                            <span style="font-weight: bold;">ประเภททุนวิจัย</span>
                            <span style="padding-left: 10px;"> @if(is_null($re->fund))
                                @else
                                {{$re->fund->fund_type}}
                                @endif</span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">หน่วยงานที่สนันสนุนทุน</span>
                            <span style="padding-left: 10px;"> @if(is_null($re->fund))
                                @else
                                {{$re->fund->support_resource}}
                                @endif</span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">หน่วยงานที่รับผิดชอบ</span>
                            <span style="padding-left: 10px;">
                                {{$re->responsible_department}}
                            </span>
                        </div>
                        <div style="padding-bottom: 10px;">

                            <span style="font-weight: bold;">งบประมาณที่ได้รับจัดสรร</span>
                            <span style="padding-left: 10px;"> {{number_format($re->budget)}} บาท</span>
                        </div>
                    </td>

                    <td style="vertical-align: top;text-align: left;">
                        <div style="padding-bottom: 10px;">
                            <span>@foreach($re->user as $user)
                                {{$user->position_th }} {{$user->fname_th}} {{$user->lname_th}}<br>
                                @endforeach</span>
                        </div>
                    </td>
                    @if($re->status == 1)
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge badge-success">ยื่นขอ</label></h6>
                    </td>
                    @elseif($re->status == 2)
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge bg-warning text-dark">ดำเนินการ</label></h6>
                    </td>
                    @else
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge bg-dark">ปิดโครงการ</label>
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

    @elseif(app()->getLocale() == 'en')
    <p>Academic service projects/ research projects</p>
    <div class="table-refund table-responsive">
        <table id="example1" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th style="font-weight: bold;">No.</th>
                    <th class="col-md-1" style="font-weight: bold;">year</th>
                    <th class="col-md-4" style="font-weight: bold;">Project Name</th>
                    <!-- <th>ระยะเวลาโครงการ</th>
                    <th>ผู้รับผิดชอบโครงการ</th>
                    <th>ประเภททุนวิจัย</th>
                    <th>หน่วยงานที่สนันสนุนทุน</th>
                    <th>งบประมาณที่ได้รับจัดสรร</th> -->
                    <th class="col-md-4" style="font-weight: bold;">Details</th>
                    <th class="col-md-2" style="font-weight: bold;">Project Manager</th>
                    <!-- <th class="col-md-5">หน่วยงานที่รับผิดชอบ</th> -->
                    <th class="col-md-1" style="font-weight: bold;">Status</th>
                </tr>
            </thead>

            
            <tbody>
                @foreach($resp as $i => $re)
                <tr>
                    <td style="vertical-align: top;text-align: left;">{{$i+1}}</td>
                    <td style="vertical-align: top;text-align: left;">{{($re->project_year)}}</td>
                    <td style="vertical-align: top;text-align: left;">
                        {{$re->project_name}}

                    </td>
                    <td>
                        <div style="padding-bottom: 10px">

                            @if ($re->project_start != null)
                            <span style="font-weight: bold;">
                                Project Duration
                            </span>
                            <span style="padding-left: 10px;">
                                {{ \Carbon\Carbon::parse($re->project_start)->format('d/m/Y') }} to {{ \Carbon\Carbon::parse($re->project_end)->format('d/m/Y') }}
                            </span>
                            @else
                            <span style="font-weight: bold;">
                                Project Duration
                            </span>
                            <span>

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
                            <span style="font-weight: bold;">Research Fund Type</span>
                            <span style="padding-left: 10px;"> @if(is_null($re->fund))
                                @else
                                {{$re->fund->fund_type_en}}
                                @endif</span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">Funding Agency</span>
                            <span style="padding-left: 10px;"> @if(is_null($re->fund))
                                @else
                                {{$re->fund->support_resource_en}}
                                @endif</span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">Responsible Department</span>
                            <span style="padding-left: 10px;">
                                {{$re->responsible_department_en}}
                            </span>
                        </div>
                        <div style="padding-bottom: 10px;">

                            <span style="font-weight: bold;">Budget Allocated</span>
                            <span style="padding-left: 10px;"> {{number_format($re->budget)}} Bath</span>
                        </div>
                    </td>

                    <td style="vertical-align: top;text-align: left;">
                        <div style="padding-bottom: 10px;">
                            <span>@foreach($re->user as $user)
                                {{$user->position_en }} {{$user->fname_en}} {{$user->lname_en}}<br>
                                @endforeach</span>
                        </div>
                    </td>
                    @if($re->status == 1)
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge badge-success">Submitted</label></h6>
                    </td>
                    @elseif($re->status == 2)
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge bg-warning text-dark">In Progress</label></h6>
                    </td>
                    @else
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge bg-dark">Project Closed</label>
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

    @elseif(app()->getLocale() == 'cn')
    <p>学术服务项目/研究项目</p>
    <div class="table-refund table-responsive">
        <table id="example1" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th style="font-weight: bold;">序号</th>
                    <th class="col-md-1" style="font-weight: bold;">年份</th>
                    <th class="col-md-4" style="font-weight: bold;">项目名称</th>
                    <!-- <th>ระยะเวลาโครงการ</th>
                    <th>ผู้รับผิดชอบโครงการ</th>
                    <th>ประเภททุนวิจัย</th>
                    <th>หน่วยงานที่สนันสนุนทุน</th>
                    <th>งบประมาณที่ได้รับจัดสรร</th> -->
                    <th class="col-md-4" style="font-weight: bold;">详细信息</th>
                    <th class="col-md-2" style="font-weight: bold;">项目负责人</th>
                    <!-- <th class="col-md-5">หน่วยงานที่รับผิดชอบ</th> -->
                    <th class="col-md-1" style="font-weight: bold;">状态</th>
                </tr>
            </thead>

            
            <tbody>
                @foreach($resp as $i => $re)
                <tr>
                    <td style="vertical-align: top;text-align: left;">{{$i+1}}</td>
                    <td style="vertical-align: top;text-align: left;">{{($re->project_year)}}</td>
                    <td style="vertical-align: top;text-align: left;">
                        {{$re->project_name}}

                    </td>
                    <td>
                        <div style="padding-bottom: 10px">

                            @if ($re->project_start != null)
                            <span style="font-weight: bold;">
                                项目期限
                            </span>
                            <span style="padding-left: 10px;">
                                {{ \Carbon\Carbon::parse($re->project_start)->format('Y年m月d日') }} 到 {{ \Carbon\Carbon::parse($re->project_end)->format('Y年m月d日') }}
                            </span>
                            @else
                            <span style="font-weight: bold;">
                                项目期限
                            </span>
                            <span>

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
                            <span style="font-weight: bold;">研究基金类型</span>
                            <span style="padding-left: 10px;"> @if(is_null($re->fund))
                                @else
                                {{$re->fund->fund_type_cn}}
                                @endif</span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">资助机构</span>
                            <span style="padding-left: 10px;"> @if(is_null($re->fund))
                                @else
                                {{$re->fund->support_resource_cn}}
                                @endif</span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">负责部门</span>
                            <span style="padding-left: 10px;">
                                {{$re->responsible_department_cn}}
                            </span>
                        </div>
                        <div style="padding-bottom: 10px;">

                            <span style="font-weight: bold;">已分配预算</span>
                            <span style="padding-left: 10px;"> {{number_format($re->budget)}} 铢</span>
                        </div>
                    </td>

                    <td style="vertical-align: top;text-align: left;">
                        <div style="padding-bottom: 10px;">
                            <span>@foreach($re->user as $user)
                                {{$user->position_cn }} {{$user->fname_cn}} {{$user->lname_cn}}<br>
                                @endforeach</span>
                        </div>
                    </td>
                    @if($re->status == 1)
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge badge-success">已提交</label></h6>
                    </td>
                    @elseif($re->status == 2)
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge bg-warning text-dark">进行中</label></h6>
                    </td>
                    @else
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge bg-dark">项目已关闭</label>
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
    @endif


</div>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<!-- <script>
    $(document).ready(function() {

        var table1 = $('#example1').DataTable({
            responsive: true,
        });
    });
</script> -->
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