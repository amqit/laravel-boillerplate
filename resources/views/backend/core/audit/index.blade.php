@extends('backend.container.layout')
@section('title', $title)
@section('breadcrumbs')
    {{ Breadcrumbs::render('logs') }}
    <div class="page-title">
        <h2><span class="fa fa-table"></span> @lang('module.logs_title') <small>@lang('module.logs_title_desc')</small></h2>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-danger">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="grid-data">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Module</th>
                                <th>Task</th>
                                <th>IP Address</th>
                                <th>Activity Date</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                        </table>
                        <div class="hidden">
                            {{ Form::open(array('url' => url('setting/system/logs/destroy'),'id' => 'formDelete')) }}
                            {{ Form::hidden('secure_id', null, array('id' => 'row-id')) }}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('append_js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#grid-data').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('admin/system/logs/grid') }}'
                },
                columns: [
                    {data: 'user', name: 'user'},
                    {data: 'module', name: 'module'},
                    {data: 'task', name: 'task'},
                    {data: 'ipaddress', name: 'ipaddress'},
                    {data: 'created', name: 'created'},
                    {data: 'note', name: 'note', orderable: false}
                ]
            });
        });
    </script>
@endsection