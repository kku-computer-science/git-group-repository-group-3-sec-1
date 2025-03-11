@extends('dashboards.users.layouts.user-dash-layout')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">{{ trans('message.Role_navbar_title') }}</h4>
                @can('role-create')
                <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('roles.create') }}"><i class="mdi mdi-plus btn-icon-prepend"></i>{{ trans('message.Add_role') }}</a>
                @endcan

                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>{{ trans('message.Role_name') }}</th>
                            <th width="280px">{{ trans('message.Role_action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($data as $key => $role)

                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
                                    <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="view" href="{{ route('roles.show',$role->id) }}"><i class="mdi mdi-eye"></i></a>
                                    @can('role-edit')
                                    <a class="btn btn-outline-success btn-sm " type="button" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('roles.edit',$role->id) }}"><i class="mdi mdi-pencil"></i></a>
                                    @endcan


                                    @can('role-delete')

                                    @csrf
                                    @method('DELETE')

                                    <li class="list-inline-item">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-outline-danger btn-sm show_confirm" type="submit" data-toggle="tooltip" title="Delete"><i class="mdi mdi-delete"></i></button>
                                    </li>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->render() }}
            </div>
        </div>
    </div>
</div>
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