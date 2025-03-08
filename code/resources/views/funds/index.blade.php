@extends('dashboards.users.layouts.user-dash-layout')

<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">{{ trans('message.Research_grant') }}</h4>
                <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('funds.create') }}"><i
                        class="mdi mdi-plus btn-icon-prepend"></i> {{ trans('message.Add_research_grant') }}</a>
                <div class="table-responsive">
                    <table id="example1" class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ trans('message.Fund_no') }}</th>
                                <th>{{ trans('message.Fund_name') }}</th>
                                <th>{{ trans('message.Fund_type') }}</th>
                                <th>{{ trans('message.Fund_level') }}</th>
                                <!-- <th>Create by</th> -->
                                <th>{{ trans('message.Fund_action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($funds as $i => $fund)
                                <tr>

                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ Str::limit($fund->fund_name, 80) }}</td>
                                    <td>
                                        @if (App::getLocale() == 'th')
                                            @if ($fund->fund_type == 'ทุนภายใน')
                                                {{ trans('message.internal_fund') }}
                                            @elseif($fund->fund_type == 'ทุนภายนอก')
                                                {{ trans('message.external_fund') }}
                                            @endif
                                        @elseif(App::getLocale() == 'en')
                                            @if ($fund->fund_type == 'ทุนภายใน')
                                                {{ trans('message.internal_fund') }}
                                            @elseif($fund->fund_type == 'ทุนภายนอก')
                                                {{ trans('message.external_fund') }}
                                            @endif
                                        @elseif(App::getLocale() == 'cn')
                                            @if ($fund->fund_type == 'ทุนภายใน')
                                                {{ trans('message.internal_fund') }}
                                            @elseif($fund->fund_type == 'ทุนภายนอก')
                                                {{ trans('message.external_fund') }}
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if (App::getLocale() == 'th')
                                            @if ($fund->fund_level == 'ไม่ระบุ')
                                                {{ trans('message.Fund_level_not_define') }}
                                            @elseif($fund->fund_level == 'ล่าง')
                                                {{ trans('message.Fund_level_low') }}
                                            @elseif($fund->fund_level == 'กลาง')
                                                {{ trans('message.Fund_level_medium') }}
                                            @elseif($fund->fund_level == 'สูง')
                                                {{ trans('message.Fund_level_high') }}
                                            @endif
                                        @elseif(App::getLocale() == 'en')
                                            @if ($fund->fund_level == 'ไม่ระบุ')
                                                {{ trans('message.Fund_level_not_define') }}
                                            @elseif($fund->fund_level == 'ล่าง')
                                                {{ trans('message.Fund_level_low') }}
                                            @elseif($fund->fund_level == 'กลาง')
                                                {{ trans('message.Fund_level_medium') }}
                                            @elseif($fund->fund_level == 'สูง')
                                                {{ trans('message.Fund_level_high') }}
                                            @endif
                                        @elseif(App::getLocale() == 'cn')
                                            @if ($fund->fund_level == 'ไม่ระบุ')
                                                {{ trans('message.Fund_level_not_define') }}
                                            @elseif($fund->fund_level == 'ล่าง')
                                                {{ trans('message.Fund_level_low') }}
                                            @elseif($fund->fund_level == 'กลาง')
                                                {{ trans('message.Fund_level_medium') }}
                                            @elseif($fund->fund_level == 'สูง')
                                                {{ trans('message.Fund_level_high') }}
                                            @endif
                                        @endif
                                    </td>
                                    <!-- <td>{{ $fund->user->fname_en }} {{ $fund->user->lname_en }}</td> -->

                                    <td>
                                        @csrf
                                        <form action="{{ route('funds.destroy', $fund->id) }}" method="POST">
                                            <li class="list-inline-item">
                                                <a class="btn btn-outline-primary btn-sm" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="view"
                                                    href="{{ route('funds.show', $fund->id) }}"><i
                                                        class="mdi mdi-eye"></i></a>
                                            </li>
                                            @if (Auth::user()->can('update', $fund))
                                                <li class="list-inline-item">
                                                    <a class="btn btn-outline-success btn-sm" type="button"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"
                                                        href="{{ route('funds.edit', Crypt::encrypt($fund->id)) }}"><i
                                                            class="mdi mdi-pencil"></i></a>
                                                </li>
                                            @endif

                                            @if (Auth::user()->can('delete', $fund))
                                                @csrf
                                                @method('DELETE')

                                                <li class="list-inline-item">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-outline-danger btn-sm show_confirm"
                                                        type="submit" data-toggle="tooltip" title="Delete"><i
                                                            class="mdi mdi-delete"></i></button>
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
