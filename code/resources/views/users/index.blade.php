@extends('dashboards.users.layouts.user-dash-layout')
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@section('content')
<style>
    .table-responsive {
        margin: 30px 0;
    }

    .table-wrapper {
        min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }


    .search-box {
        position: relative;
        float: right;
    }

    .search-box .input-group {
        min-width: 300px;
        position: absolute;
        right: 0;
    }

    .search-box .input-group-addon,
    .search-box input {
        border-color: #ddd;
        border-radius: 0;
    }

    .search-box input {
        height: 34px;
        padding-right: 35px;
        background: #0e393e;
        color: #ffffff;
        border: none;
        border-radius: 15px !important;
    }

    .search-box input:focus {
        background: #0e393e;
        color: #ffffff;
    }

    .search-box input::placeholder {
        font-style: italic;
    }

    .search-box .input-group-addon {
        min-width: 35px;
        border: none;
        background: transparent;
        position: absolute;
        right: 0;
        z-index: 9;
        padding: 6px 0;
    }

    .search-box i {
        color: #a0a5b1;
        font-size: 19px;
        position: relative;
        top: 2px;
    }
</style>
<script>
    $(document).ready(function() {
        // Activate tooltips
        $('[data-toggle="tooltip"]').tooltip();

        // Filter table rows based on searched term
        $("#search").on("keyup", function() {
            var term = $(this).val().toLowerCase();
            $("table tbody tr").each(function() {
                $row = $(this);
                var name = $row.find("td:nth-child(2)").text().toLowerCase();
                console.log(name);
                if (name.search(term) < 0) {
                    $row.hide();
                } else {
                    $row.show();
                }
            });
        });
    });
</script>
<div class="container">
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div>
    @endif
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ trans('message.User_navbar_title')}}</h4>
            <a class="btn btn-primary btn-icon-text btn-sm" href="{{ route('users.create')}}"><i class="ti-plus btn-icon-prepend icon-sm"></i>{{ trans('message.Add_user')}}</a>
            <a class="btn btn-primary btn-icon-text btn-sm" href="{{ route('importfiles')}}"><i class="ti-download btn-icon-prepend icon-sm"></i>{{ trans('message.Import_new_user')}}</a>
            <!-- <div class="search-box">
                <div class="input-group">
                    <input type="text" id="search" class="form-control" placeholder="Search by Name">
                    <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                </div>
            </div> -->

            <div class="table-responsive">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('message.User_name')}}</th>
                            <th>{{ trans('message.User_department')}}</th>
                            <th>{{ trans('message.User_email')}}</th>
                            <th>{{ trans('message.User_role')}}</th>
                            <th width="280px">{{ trans('message.User_action')}}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ $key++ }}</td>
                            <td>
                                @php
                                    $locale = app()->getLocale();
                                    $fname = $locale == 'th' ? ($user->fname_th ?? $user->fname_en ?? $user->fname_cn ?? null)
                                            : ($locale == 'en' ? ($user->fname_en ?? $user->fname_th ?? $user->fname_cn ?? null)
                                            : ($locale == 'cn' ? ($user->fname_cn ?? $user->fname_en ?? $user->fname_th ?? null)
                                            : ($user->fname_en ?? $user->fname_th ?? $user->fname_cn ?? null)));

                                    $lname = $locale == 'th' ? ($user->lname_th ?? $user->lname_en ?? $user->lname_cn ?? null)
                                            : ($locale == 'en' ? ($user->lname_en ?? $user->lname_th ?? $user->lname_cn ?? null)
                                            : ($locale == 'cn' ? ($user->lname_cn ?? $user->lname_en ?? $user->lname_th ?? null)
                                            : ($user->lname_en ?? $user->lname_th ?? $user->lname_cn ?? null)));
                                @endphp
                                {{ $fname }} {{ $lname }}
                            </td>
                            <td>
                                @php
                                    $locale = app()->getLocale();
                                    $department = $locale == 'th' ? ($user->program->program_name_th ?? $user->program->program_name_en ?? $user->program->program_name_cn ?? null)
                                            : ($locale == 'en' ? ($user->program->program_name_en ?? $user->program->program_name_th ?? $user->program->program_name_cn ?? null)
                                            : ($locale == 'cn' ? ($user->program->program_name_cn ?? $user->program->program_name_en ?? $user->program->program_name_th ?? null)
                                            : ($user->program->program_name_en ?? $user->program->program_name_th ?? $user->program->program_name_cn ?? null)));
                                @endphp
                                {{ Str::limit($department, 20) }}
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $val)
                                        @php
                                            $locale = app()->getLocale();
                                            $role = match ($locale) {
                                                'th' => match ($val) {
                                                    'admin' => 'ผู้ดูแลระบบ',
                                                    'teacher' => 'อาจารย์',
                                                    'student' => 'นักเรียน',
                                                    'headproject' => 'หัวหน้าโครงการ',
                                                    'staff' => 'เจ้าหน้าที่',
                                                    default => $val,
                                                },
                                                'en' => match ($val) {
                                                    'admin' => 'Admin',
                                                    'teacher' => 'Teacher',
                                                    'student' => 'Student',
                                                    'headproject' => 'Head Project',
                                                    'staff' => 'Staff',
                                                    default => $val,
                                                },
                                                'cn' => match ($val) {
                                                    'admin' => '管理员',
                                                    'teacher' => '老师',
                                                    'student' => '学生',
                                                    'headproject' => '项目负责人',
                                                    'staff'=> '职员',
                                                    default => $val,
                                                },
                                                default => $val,
                                            };
                                        @endphp
                                        <label class="badge badge-dark">{{ $role }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                <li class="list-inline-item">
                                    <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="view" href="{{ route('users.show',$user->id) }}"><i class="mdi mdi-eye"></i></a>
                                </li>
                                    @can('user-edit')
                                    <li class="list-inline-item">
                                    <a class="btn btn-outline-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('users.edit',$user->id) }}"><i class="mdi mdi-pencil"></i></a>
                                    </li>
                                    @endcan
                                    @can('user-delete')
                                    <!-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy',
                                $user->id],'style'=>'display:inline']) !!}
                                {!! Form::button('<i class="mdi mdi-delete"></i>', ['type' => 'submit','class' => 'btn btn-outline-danger btn-sm','type'=>'button','data-toggle'=>'tooltip'
                                ,'data-placement'=>'top', 'title'=>'Delete']) !!}
                                {!! Form::close() !!} -->
                                    @csrf
                                    @method('DELETE')

                                    <li class="list-inline-item">
                                        <button class="btn btn-outline-danger btn-sm show_confirm" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></button>
                                    </li>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer></script>
<script>
    $(document).ready(function() {
        var table = $('#example1').DataTable({
            fixedHeader: true,
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
                    swal("Delete Successfully", {
                        icon: "success",
                    }).then(function() {
                        location.reload();
                        form.submit();
                    });
                }
            });
    });
</script>
@endsection