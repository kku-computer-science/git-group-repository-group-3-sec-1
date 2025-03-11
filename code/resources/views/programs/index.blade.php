@extends('dashboards.users.layouts.user-dash-layout')
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<style type="text/css">
    .dropdown-toggle {
        height: 40px;
        width: 400px !important;
    }

    body label:not(.input-group-text) {
        margin-top: 10px;
    }

    body .my-select {
        background-color: #EFEFEF;
        color: #212529;
        border: 0 none;
        border-radius: 10px;
        padding: 6px 20px;
        width: 100%;
    }
</style>
@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center;">{{ trans('message.Manage_Program_navbar_title') }}</h4>
                <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="javascript:void(0)" id="new-program"
                    data-toggle="modal"><i class="mdi mdi-plus btn-icon-prepend"></i> {{ trans('message.Add_program') }}
                </a>
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ trans('message.Program_no') }}</th>
                            <th>{{ trans('message.Program_name') }}</th>
                            <!-- <th>Name (Eng)</th> -->
                            <th>{{ trans('message.Program_degree') }}</th>
                            <th>{{ trans('message.Program_action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($programs as $i => $program)
                            <tr id="program_id_{{ $program->id }}">
                                <td>{{ $i + 1 }}</td>
                                <td>
                                    @if (App::getLocale() == 'th')
                                        {{ $program->program_name_th }}
                                    @elseif(App::getLocale() == 'en')
                                        {{ $program->program_name_en }}
                                    @elseif(App::getLocale() == 'cn')
                                        {{ $program->program_name_cn }}
                                    @endif
                                </td>
                                <!-- <td>{{ $program->program_name_en }}</td> -->
                                <td>{{ $program->degree->degree_name_en }}</td>
                                <td>
                                    <form action="{{ route('programs.destroy', $program->id) }}" method="POST">
                                        <!-- <a class="btn btn-info" id="show-program" data-toggle="modal" data-id="{{ $program->id }}">Show</a> -->

                                        <!-- <a class="btn btn-outline-primary btn-sm" id="show-program" type="button" data-toggle="modal" data-placement="top" title="view" data-id="{{ $program->id }}"><i class="mdi mdi-eye"></i></a>
                                         -->
                                        <!-- <a href="javascript:void(0)" class="btn btn-success" id="edit-program" data-toggle="modal" data-id="{{ $program->id }}">Edit </a> -->
                                        <li class="list-inline-item">
                                            <a class="btn btn-outline-success btn-sm" id="edit-program" type="button"
                                                data-toggle="modal" data-id="{{ $program->id }}" data-placement="top"
                                                title="Edit" href="javascript:void(0)"><i class="mdi mdi-pencil"></i></a>
                                        </li>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <li class="list-inline-item">
                                            <button class="btn btn-outline-danger btn-sm " id="delete-program"
                                                type="submit" data-id="{{ $program->id }}" data-toggle="tooltip"
                                                data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></button>
                                        </li>
                                    </form>
                                    <!-- <a id="delete-program" data-id="{{ $program->id }}" class="btn btn-danger delete-user">Delete</a> -->

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Add and Edit program modal -->
    <div class="modal fade" id="crud-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="programCrudModal"></h4>
                </div>
                <div class="modal-body">
                    <form name="proForm" action="{{ route('programs.store') }}" method="POST">
                        <input type="hidden" name="pro_id" id="pro_id">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>{{ trans('message.Program_degree') }}:</strong>
                                    <div class="col-sm-8">
                                        <select id="degree" class="custom-select my-select" name="degree">
                                            @foreach ($degree as $d)
                                                <option value="{{ $d->id }}">{{ $d->degree_name_th }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <strong>{{ trans('message.Department_name') }}:</strong>
                                    <div class="col-sm-8">
                                        <select id="department" class="custom-select my-select" name="department">
                                            @foreach ($department as $d)
                                                <option value="{{ $d->id }}">{{ $d->department_name_th }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <strong>{{ trans('message.Program_name_th') }}:</strong>
                                    <input type="text" name="program_name_th" id="program_name_th" class="form-control"
                                        placeholder="{{ trans('message.Program_name_th') }}" onchange="validate()">
                                </div>
                                <div class="form-group">
                                    <strong>{{ trans('message.Program_name_en') }}:</strong>
                                    <input type="text" name="program_name_en" id="program_name_en"
                                        class="form-control" placeholder="{{ trans('message.Program_name_en') }}" onchange="validate()">
                                </div>
                                <div class="form-group">
                                    <strong>{{ trans('message.Program_name_cn') }}:</strong>
                                    <input type="text" name="program_name_cn" id="program_name_cn"
                                        class="form-control" placeholder="{{ trans('message.Program_name_cn') }}" onchange="validate()">
                                </div>
                                <!-- <div class="form-group">
                                    <strong>ระดับการศึกษา:</strong>
                                    <input type="text" name="degree_id" id="degree_id" class="form-control" placeholder="degree_id" onchange="validate()">
                                </div> -->

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary"
                                    disabled>{{ trans('message.Submit_button') }}</button>
                                <a href="{{ route('programs.index') }}" class="btn btn-danger">{{ trans('message.Cancle_button') }}</a>
                                <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                            </div>
                        </div>
                    </form>
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
    <script>
        $(document).ready(function() {

            /* When click New program button */
            $('#new-program').click(function() {
                $('#btn-save').val("create-program");
                $('#program').trigger("reset");
                $('#programCrudModal').html("{{ trans('message.Add_new_program') }}");
                $('#crud-modal').modal('show');
            });

            /* Edit program */
            $('body').on('click', '#edit-program', function() {
                var program_id = $(this).data('id');
                $.get('programs/' + program_id + '/edit', function(data) {
                    $('#programCrudModal').html("{{ trans('message.Edit_program') }}");
                    $('#btn-update').val("Update");
                    $('#btn-save').prop('disabled', false);
                    $('#crud-modal').modal('show');
                    $('#pro_id').val(data.id);
                    $('#program_name_th').val(data.program_name_th);
                    $('#program_name_en').val(data.program_name_en);
                    //$('#degree').val(data.program_name_en);
                    $('#degree').val(data.degree_id);
                })
            });


            /* Delete program */
            $('body').on('click', '#delete-program', function(e) {
                var program_id = $(this).data("id");

                var token = $("meta[name='csrf-token']").attr("content");
                e.preventDefault();
                //confirm("Are You sure want to delete !");
                swal({
                    title: `{{ trans('message.Fund_warning_delete.warning_title') }}`,
                    text: "{{ trans('message.Fund_warning_delete.warning_text') }}",
                    type: "warning",
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
                }).then((willDelete) => {
                    if (willDelete) {
                        swal("{{ trans('message.Delete_successfully') }}", {
                            icon: "success",
                        }).then(function() {
                            location.reload();
                            $.ajax({
                                type: "DELETE",
                                url: "programs/" + program_id,
                                data: {
                                    "id": program_id,
                                    "_token": token,
                                },
                                success: function(data) {
                                    $('#msg').html(
                                        '{{ trans('message.Program_entry_deleted') }}'
                                        );
                                    $("#program_id_" + program_id).remove();
                                },
                                error: function(data) {
                                    console.log('Error:', data);
                                }
                            });
                        });

                    }
                });
            });
        });
    </script>
    <script>
        error = false

        function validate() {
            if (document.proForm.program_name_th.value != '' && document.proForm.program_name_en.value != '')
                document.proForm.btnsave.disabled = false
            else
                document.proForm.btnsave.disabled = true
        }
    </script>
@stop
