@inject('AppHelpers', '\App\Libraries\AppHelpers')
@if($AppHelpers->access('is_create', 'admin.system.menus'))
    <button class="btn btn-default" onclick="appModal('{{route('admin.system.menus.group_create')}}','{{__('module.menu_group_title')}}',null)"><i class="fa fa-plus"></i> @lang('button.btn_add')</button>
    <div>&nbsp;</div>
@endif
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="grid-menu">
        <thead>
        <tr>
            <th>@lang('text.name')</th>
            <th>@lang('text.slug')</th>
            <th width="150">@lang('common.action')</th>
        </tr>
        </thead>
    </table>
</div>
<div class="hidden">
    {{ Form::open(['route' => 'admin.system.menus.group_destroy','id' => 'formGroupDelete']) }}
    {{ Form::hidden('secure_id', null, ['id' => 'row-id']) }}
    {{ Form::close() }}
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#grid-menu').DataTable({
            processing: true,
            serverSide: true,
            bFilter: false,
            paging: false,
            ordering: false,
            ajax: {
                url: '{{ url('admin/system/menus/group_grid') }}'
            },
            columns: [
                {data: 'name', name: 'name'},
                {data: 'alias', name: 'alias', orderable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
