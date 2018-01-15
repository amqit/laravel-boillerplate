@inject('AppHelpers', '\App\Libraries\AppHelpers')
@extends('backend.container.layout')
@section('title', $title)
@section('breadcrumbs')
    {{ Breadcrumbs::render('users') }}
    <div class="page-title">
        <h2><span class="fa fa-table"></span> @lang('module.user_title')</h2>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$title}}</h3>
                    <ul class="panel-controls">
                        @if($AppHelpers->access('is_create', 'admin.system.groups'))
                            <li>
                                <a href="{{ route('admin.system.users.create') }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('button.btn_add')"><i class="fa fa-plus"></i></a>
                            </li>
                        @endif
                        <li><a href="#" class="panel-refresh" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.reload')"><span class="fa fa-refresh"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="grid-data">
                            <thead>
                            <tr>
                                <th>@lang('text.name')</th>
                                <th>@lang('text.email')</th>
                                <th>@lang('text.group')</th>
                                <th>@lang('text.last_login')</th>
                                <th>@lang('common.status')</th>
                                <th width="100">@lang('common.action')</th>
                            </tr>
                            </thead>
                        </table>
                        <div class="hidden">
                            {{ Form::open(['route' => 'admin.system.users.destroy','id' => 'formDelete']) }}
                            {{ Form::hidden('secure_id', null, ['id' => 'row-id']) }}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('append_js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#grid-data').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('admin/system/users/grid') }}'
                },
                columns: [
                    {data: 'fullname', name: 'fullname'},
                    {data: 'email', name: 'email', orderable: false},
                    {data: 'group', name: 'group'},
                    {data: 'last_login', name: 'last_login', orderable: false},
                    {data: 'active', name: 'active', orderable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection