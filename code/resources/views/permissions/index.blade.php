@extends('dashboards.users.layouts.user-dash-layout')
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <div class="card">
            <div class="card-header">{{ trans('message.Permission_navbar_title') }}
                @can('permission-create')
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('permissions.create') }}">{{ trans('message.Add_permission') }}</a>
                </span>
                @endcan
            </div>
            <div class="card-body">
                <table id ="example1" class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>{{ trans('message.Permission_name') }}</th>
                            <th width="280px">{{ trans('message.Permission_action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <form action="{{ route('permissions.destroy',$permission->id) }}" method="POST">
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="view" href="{{ route('permissions.show',$permission->id) }}"><i class="mdi mdi-eye"></i></a>
                                    </li>

                                    <!-- <a class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="view" href="{{ route('permissions.show',$permission->id) }}"><i class="fa fa-table"></i></a> -->
                                    <!-- <a class="btn btn-success" href="{{ route('permissions.show',$permission->id) }}">Show</a> -->
                                    @can('permission-edit')
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('permissions.edit',$permission->id) }}"><i class="mdi mdi-pencil"></i></a>
                                    </li>
                                    <!-- <a class="btn btn-primary" href="{{ route('permissions.edit',$permission->id) }}">Edit</a> -->
                                    @endcan
                                    @can('permission-delete')
                                    <!-- {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit','class' => 'btn btn-danger btn-sm rounded-0','type'=>'button','data-toggle'=>'tooltip' ,'data-placement'=>'top', 'title'=>'Delete']) !!}
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
            <div class="justify-content-center">
                
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src = "https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer ></script>
<script src = "https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer ></script>
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
@endsection