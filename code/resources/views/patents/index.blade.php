@extends('dashboards.users.layouts.user-dash-layout')
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
@section('title', 'Dashboard')

@section('content')

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">{{ trans('message.Other_academic_works_header') }}</h4>
                <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('patents.create') }}"><i
                        class="mdi mdi-plus btn-icon-prepend"></i> {{ trans('message.Add_other_academic_works') }} </a>
                <!-- <div class="table-responsive"> -->
                <table id ="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ trans('message.Other_academic_works_no') }}</th>
                            <th>{{ trans('message.Other_academic_works_title') }}</th>
                            <th>{{ trans('message.Other_academic_works_type') }}</th>
                            <th>{{ trans('message.Other_academic_registration_date') }}</th>
                            <th>{{ trans('message.Other_academic_registration_no') }}</th>
                            <th>{{ trans('message.Other_academic_works_author') }}</th>
                            <th width="280px">{{ trans('message.Other_academic_works_action') }}</th>
                        </tr>
                        <thead>
                        <tbody>
                            @foreach ($patents as $i => $paper)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ Str::limit($paper->ac_name, 50) }}</td>
                                    <td>
                                        @if (App::getLocale() == 'th')
                                            @if ($paper->ac_type == 'สิทธิบัตร')
                                                {{ trans('message.Other_academic_works_Patent') }}
                                            @elseif($paper->ac_type == 'สิทธิบัตร (การประดิษฐ์)')
                                                {{ trans('message.Other_academic_works_Patent_Invention') }}
                                            @elseif($paper->ac_type == 'สิทธิบัตร (การออกแบบผลิตภัณฑ์)')
                                                {{ trans('message.Other_academic_works_Patent_ProductDesign') }}
                                            @elseif($paper->ac_type == 'อนุสิทธิบัตร')
                                                {{ trans('message.Other_academic_works_UtilityModel') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์')
                                                {{ trans('message.Other_academic_works_Copyright') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (วรรณกรรม)')
                                                {{ trans('message.Other_academic_works_Copyright_LiteraryWork') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (ตนตรีกรรม)')
                                                {{ trans('message.Other_academic_works_Copyright_Music') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (ภาพยนตร์)')
                                                {{ trans('message.Other_academic_works_Copyright_Film') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (ศิลปกรรม)')
                                                {{ trans('message.Other_academic_works_Copyright_Art') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (งานแพร่เสี่ยงแพร่ภาพ)')
                                                {{ trans('message.Other_academic_works_Copyright_Broadcast') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (โสตทัศนวัสดุ)')
                                                {{ trans('message.Other_academic_works_Copyright_AudioVisualWork') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (งานอื่นใดในแผนกวรรณคดี/วิทยาศาสตร์/ศิลปะ)')
                                                {{ trans('message.Other_academic_works_Copyright_Other_Works') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (สิ่งบันทึกเสียง)')
                                                {{ trans('message.Other_academic_works_Copyright_SoundRecording') }}
                                            @elseif($paper->ac_type == 'ความลับทางการค้า')
                                                {{ trans('message.Other_academic_works_Trade_Secret') }}
                                            @elseif($paper->ac_type == 'เครื่องหมายการค้า')
                                                {{ trans('message.Other_academic_works_Trade_Mark') }}
                                            @endif
                                        @elseif(App::getLocale() == 'en')
                                            @if ($paper->ac_type == 'สิทธิบัตร')
                                                {{ trans('message.Other_academic_works_Patent') }}
                                            @elseif($paper->ac_type == 'สิทธิบัตร (การประดิษฐ์)')
                                                {{ trans('message.Other_academic_works_Patent_Invention') }}
                                            @elseif($paper->ac_type == 'สิทธิบัตร (การออกแบบผลิตภัณฑ์)')
                                                {{ trans('message.Other_academic_works_Patent_ProductDesign') }}
                                            @elseif($paper->ac_type == 'อนุสิทธิบัตร')
                                                {{ trans('message.Other_academic_works_UtilityModel') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์')
                                                {{ trans('message.Other_academic_works_Copyright') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (วรรณกรรม)')
                                                {{ trans('message.Other_academic_works_Copyright_LiteraryWork') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (ตนตรีกรรม)')
                                                {{ trans('message.Other_academic_works_Copyright_Music') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (ภาพยนตร์)')
                                                {{ trans('message.Other_academic_works_Copyright_Film') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (ศิลปกรรม)')
                                                {{ trans('message.Other_academic_works_Copyright_Art') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (งานแพร่เสี่ยงแพร่ภาพ)')
                                                {{ trans('message.Other_academic_works_Copyright_Broadcast') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (โสตทัศนวัสดุ)')
                                                {{ trans('message.Other_academic_works_Copyright_AudioVisualWork') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (งานอื่นใดในแผนกวรรณคดี/วิทยาศาสตร์/ศิลปะ)')
                                                {{ trans('message.Other_academic_works_Copyright_Other_Works') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (สิ่งบันทึกเสียง)')
                                                {{ trans('message.Other_academic_works_Copyright_SoundRecording') }}
                                            @elseif($paper->ac_type == 'ความลับทางการค้า')
                                                {{ trans('message.Other_academic_works_Trade_Secret') }}
                                            @elseif($paper->ac_type == 'เครื่องหมายการค้า')
                                                {{ trans('message.Other_academic_works_Trade_Mark') }}
                                            @endif
                                        @elseif(App::getLocale() == 'cn')
                                            @if ($paper->ac_type == 'สิทธิบัตร')
                                                {{ trans('message.Other_academic_works_Patent') }}
                                            @elseif($paper->ac_type == 'สิทธิบัตร (การประดิษฐ์)')
                                                {{ trans('message.Other_academic_works_Patent_Invention') }}
                                            @elseif($paper->ac_type == 'สิทธิบัตร (การออกแบบผลิตภัณฑ์)')
                                                {{ trans('message.Other_academic_works_Patent_ProductDesign') }}
                                            @elseif($paper->ac_type == 'อนุสิทธิบัตร')
                                                {{ trans('message.Other_academic_works_UtilityModel') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์')
                                                {{ trans('message.Other_academic_works_Copyright') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (วรรณกรรม)')
                                                {{ trans('message.Other_academic_works_Copyright_LiteraryWork') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (ตนตรีกรรม)')
                                                {{ trans('message.Other_academic_works_Copyright_Music') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (ภาพยนตร์)')
                                                {{ trans('message.Other_academic_works_Copyright_Film') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (ศิลปกรรม)')
                                                {{ trans('message.Other_academic_works_Copyright_Art') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (งานแพร่เสี่ยงแพร่ภาพ)')
                                                {{ trans('message.Other_academic_works_Copyright_Broadcast') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (โสตทัศนวัสดุ)')
                                                {{ trans('message.Other_academic_works_Copyright_AudioVisualWork') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (งานอื่นใดในแผนกวรรณคดี/วิทยาศาสตร์/ศิลปะ)')
                                                {{ trans('message.Other_academic_works_Copyright_Other_Works') }}
                                            @elseif($paper->ac_type == 'ลิขสิทธิ์ (สิ่งบันทึกเสียง)')
                                                {{ trans('message.Other_academic_works_Copyright_SoundRecording') }}
                                            @elseif($paper->ac_type == 'ความลับทางการค้า')
                                                {{ trans('message.Other_academic_works_Trade_Secret') }}
                                            @elseif($paper->ac_type == 'เครื่องหมายการค้า')
                                                {{ trans('message.Other_academic_works_Trade_Mark') }}
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{ $paper->ac_year }}</td>
                                    <td>{{ $paper->ac_refnumber, 50 }}</td>
                                    <td>
                                        @foreach ($paper->user as $a)
                                            @if (App::getLocale() == 'th')
                                                {{ $a->fname_th }} {{ $a->lname_th }}
                                            @elseif(App::getLocale() == 'en')
                                                {{ $a->fname_en }} {{ $a->lname_en }}
                                            @elseif(App::getLocale() == 'cn')
                                                {{ $a->fname_cn }} {{ $a->lname_cn }}
                                            @endif
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <form action="{{ route('patents.destroy', $paper->id) }}" method="POST">

                                            <!-- <a class="btn btn-info" href="{{ route('patents.show', $paper->id) }}">Show</a> -->
                                            <li class="list-inline-item">
                                                <a class="btn btn-outline-primary btn-sm" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="view"
                                                    href="{{ route('patents.show', $paper->id) }}"><i
                                                        class="mdi mdi-eye"></i></a>
                                            </li>
                                            <!-- <a class="btn btn-primary" href="{{ route('patents.edit', $paper->id) }}">Edit</a> -->
                                            @if (Auth::user()->can('update', $paper))
                                                <li class="list-inline-item">
                                                    <a class="btn btn-outline-success btn-sm" type="button"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"
                                                        href="{{ route('patents.edit', $paper->id) }}"><i
                                                            class="mdi mdi-pencil"></i></a>
                                                </li>
                                            @endif
                                            @if (Auth::user()->can('delete', $paper))
                                                @csrf
                                                @method('DELETE')
                                                <li class="list-inline-item">
                                                    <button class="btn btn-outline-danger btn-sm show_confirm"
                                                        type="submit" data-toggle="tooltip" data-placement="top"
                                                        title="Delete"><i class="mdi mdi-delete"></i></button>
                                                </li>
                                            @endif
                                            <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    <tbody>
                </table>
                <!-- </div> -->
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer></script>
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
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `{{ trans('message.Fund_warning_delete.warning_title') }}`,
                    text: "{{ trans('message.Fund_warning_delete.warning_text') }}",
                    icon: "warning",
                    buttons: {
                    cancel: {
                        text: "{{ trans('message.Cancle_button') }}",
                        value: null,
                        visible: true,
                        className: "swal-button swal-button--cancel",
                        closeModal: true
                    },
                    confirm: {
                        text: "{{ trans('message.Submit_button') }}",
                        value: true,
                        visible: true,
                        className: "swal-button swal-button--confirm swal-button--danger",
                        closeModal: true
                    }
                },
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("{{ trans('message.Delete_successfully') }}", {
                            icon: "success",
                        }).then(function() {
                            location.reload();
                            form.submit();
                        });
                    }
                });
        });
    </script>
@stop
