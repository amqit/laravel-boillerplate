@inject('AppHelpers', '\App\Libraries\AppHelpers')
@extends('backend.container.layout')
@section('title', $title)
@section('breadcrumbs')
    {{ Breadcrumbs::render('groups') }}
    <div class="page-title">
        <h2><span class="fa fa-table"></span> @lang('module.group_title')</h2>
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
                                <a href="{{ url('admin/system/groups/create') }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('button.btn_add')"><i class="fa fa-plus"></i></a>
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
                                <th>@lang('forms.group_name')</th>
                                <th>@lang('text.description')</th>
                                <th>@lang('text.slug')</th>
                                <th width="150">Action</th>
                            </tr>
                            </thead>
                        </table>
                        <div class="hidden">
                            {{ Form::open(['route' => 'admin.system.groups.destroy','id' => 'formDelete']) }}
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
                    url: '{{ url('admin/system/groups/grid') }}'
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description', orderable: false},
                    {data: 'alias', name: 'alias', orderable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@stop