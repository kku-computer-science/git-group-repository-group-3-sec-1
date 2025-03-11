<!-- @php
   if(Auth::user()->hasRole('admin')) {
      $layoutDirectory = 'dashboards.admins.layouts.admin-dash-layout';
   } else {
      $layoutDirectory = 'dashboards.users.layouts.user-dash-layout';
   }
@endphp -->

@extends('dashboards.users.layouts.user-dash-layout')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <div class="card">
            <div class="card-header">{{ trans('message.Department_navbar_title') }}
                @can('departments-create')

                <a class="btn btn-primary" href="{{ route('departments.create') }}">{{ trans('message.Add_department') }}</a>

                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>{{ trans('message.Department_name') }}</th>
                            <th width="280px">{{ trans('message.Department_action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $department)
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td>
                            @php
                                        $locale = app()->getLocale();
                                        $departmentname = $locale == 'en' ? ($department->department_name_en ?? $department->department_name_th  ?? $department->department_name_cn )
                                                : ($locale == 'th' ? ($department->department_name_th  ?? $department->department_name_en ?? $department->department_name_cn )
                                                : ($department->department_name_cn  ?? $department->department_name_en ?? $department->department_name_th ));
                                    @endphp
                                    {{ $departmentname }}
                            </td>
                            <td>
                                <form action="{{ route('departments.destroy',$department->id) }}" method="POST">
                                    

                                    <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="view" href="{{ route('departments.show',$department->id) }}"><i class="mdi mdi-eye"></i></a>

                                    @can('departments-edit')

                                    <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('departments.edit',$department->id) }}"><i class="mdi mdi-pencil"></i></a>

                                    @endcan


                                    @can('departments-delete')
                                    <!-- {!! Form::open(['method' => 'DELETE','route' => ['departments.destroy', $department->id],'style'=>'display:inline']) !!}
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
                {{ $data->appends($_GET)->links() }}
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
                buttons: true,
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