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
                <h4 class="card-title">{{ trans('message.Book_navbar_title') }}</h4>
                <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('books.create') }}"><i
                        class="mdi mdi-plus btn-icon-prepend"></i> {{ trans('message.Add_book') }} </a>
                <!-- <div class="table-responsive"> -->
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ trans('message.Book_no') }}</th>
                            <th>{{ trans('message.Book_title') }}</th>
                            <th>{{ trans('message.Book_year') }}</th>
                            <th>{{ trans('message.Book_source') }}</th>
                            <th>{{ trans('message.Book_page') }}</th>
                            <th width="280px">{{ trans('message.Book_action') }}</th>
                        </tr>
                        <thead>
                        <tbody>
                            @foreach ($books as $i => $paper)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ Str::limit($paper->ac_name, 50) }}</td>
                                    <td>
                                        @if (App::getLocale() == 'th')
                                            {{ date('Y', strtotime($paper->ac_year)) + 543 }}
                                        @elseif(App::getLocale() == 'en')
                                            {{ date('Y', strtotime($paper->ac_year))}}
                                        @elseif(App::getLocale() == 'cn')
                                            {{ date('Y', strtotime($paper->ac_year))}}
                                        @endif
                                    </td>
                                    <td>
                                        @if (App::getLocale() == 'th')
                                            {{ Str::limit($paper->ac_sourcetitle, 50) }}
                                        @elseif(App::getLocale() == 'en')
                                            {{ Str::limit($paper->ac_sourcetitle_en, 50) }}
                                        @elseif(App::getLocale() == 'cn')
                                            {{ Str::limit($paper->ac_sourcetitle_cn, 50) }}
                                        @endif
                                    </td>
                                    <td>{{ $paper->ac_page }}</td>
                                    <td>
                                        <form action="{{ route('books.destroy', $paper->id) }}" method="POST">

                                            <!-- <a class="btn btn-info" href="{{ route('books.show', $paper->id) }}">Show</a> -->
                                            <li class="list-inline-item">
                                                <a class="btn btn-outline-primary btn-sm" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="view"
                                                    href="{{ route('books.show', $paper->id) }}"><i
                                                        class="mdi mdi-eye"></i></a>
                                            </li>
                                            <!-- <a class="btn btn-primary" href="{{ route('books.edit', $paper->id) }}">Edit</a> -->
                                            @if (Auth::user()->can('update', $paper))
                                                <li class="list-inline-item">
                                                    <a class="btn btn-outline-success btn-sm" type="button"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"
                                                        href="{{ route('books.edit', $paper->id) }}"><i
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
                <br>

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
                    buttons: true,
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
@stop
