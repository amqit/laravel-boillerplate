@inject('AppHelpers', '\App\Libraries\AppHelpers')
@inject('model', 'App\Models\Core\MenuModel')
@inject('menus', 'App\Http\Controllers\Backend\Core\MenuController')
@extends('backend.container.layout')
@section('title', $title)
@section('append_css')
    {{ Html::style(asset('themes/admin/css/nestable.css')) }}
@stop
@section('breadcrumbs')
    {{ Breadcrumbs::render('menu') }}
    <div class="page-title">
        <h2><span class="fa fa-table"></span> @lang('module.menu_title') </h2>
        <div class="pull-right">
            @if($AppHelpers->access('is_create', 'admin.system.menus'))
                <a role="button" class="btn btn-info" onclick="appModal('{{route('admin.system.menus.group')}}','{{__('module.menu_group_title')}}','modal-lg')" data-toggle="tooltip" data-placement="top" data-original-title="@lang('module.menu_group_title')"><i class="fa fa-list"></i> @lang('module.menu_group_title')</a>
            @endif
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default tabs">

                <ul class="nav nav-tabs" role="tablist">
                    @foreach($groupMenus as $key => $row)
                        <li class="@if($key == 0) active @endif"><a href="#{{$row->id}}" data-toggle="tab">{{$row->menu_group}}</a></li>
                    @endforeach
                </ul>
                <div class="panel-body tab-content">
                    @foreach($groupMenus as $key => $row)
                        @php($men = $model->where('menu_type','=',$row->menu_group_alias)->count())
                        @if($men > 0)
                            <div class="tab-pane @if($key == 0) active @endif" id="{{$row->id}}">
                                <div class="panel-heading">
                                    <h3 class="panel-title">{{$row->menu_group}} {{$title}}</h3>
                                    <ul class="panel-controls" id="nestable-menu">
                                        @if($AppHelpers->access('is_create', 'admin.system.menus'))
                                            <li>
                                                <a  href="{{ route('admin.system.menus.create',['menu_type' => $row->menu_group_alias]) }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('module.menu_link_add')"><i class="fa fa-link"></i></a>
                                            </li>
                                        @endif
                                        <li><a href="#" class="panel-refresh" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.reload')"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" type="button" data-action="expand-all" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.expand')"><span class="fa fa-arrow-down"></span></a></li>
                                        <li><a href="#" type="button" data-action="collapse-all" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.collapse')"><span class="fa fa-arrow-up"></span></a></li>
                                    </ul>
                                </div>
                                <div>&nbsp;</div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="dd" id="nestable">
                                            {!! $menus->generateMenu($row->menu_group_alias) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="tab-pane @if($key == 0) active @endif" id="{{$row->id}}">
                                <div class="panel-heading">
                                    <h3 class="panel-title">{{$row->menu_group}} {{$title}}</h3>
                                </div>
                                <div>&nbsp;</div>
                                <div class="row">
                                    @if($AppHelpers->access('is_create', 'admin.system.menus'))
                                        <div class="col-lg-12">@lang('module.menu_group_nolink') <a role="button" class="btn btn-xs btn-success" href="{{ route('admin.system.menus.create',['menu_type' => $row->menu_group_alias]) }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('button.btn_add')"><i class="fa fa-plus"></i> @lang('module.menu_link_add')</a></div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="hidden">
                        {{ Form::open(['route' => 'admin.system.menus.destroy','id' => 'formDelete']) }}
                        {{ Form::hidden('secure_id', null, ['id' => 'row-id']) }}
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button type="submit" id="updateOrder" class="btn btn-primary"><i class="fa fa-save"></i> @lang('button.save_menu_order')</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('append_js')
    {{ Html::script(asset('themes/admin/js/plugins/nestable/jquery.nestable.js'), ['type' => 'text/javascript']) }}
@stop
@section('custom_js')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#nestable").nestable();
            $('#nestable-menu').on('click', function(e){
                var target = $(e.target),
                    action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });

            $('#updateOrder').click(function () {
                var output = window.JSON.stringify($('#nestable').nestable('serialize'));
                $.ajax({
                    url: '{{route('admin.system.menus.reposition')}}',
                    type: 'post',
                    dataType: 'json',
                    data: {'menu': output}
                }).done(function (json) {
                    if (json.stat) {
                        console.log('update order success');
                    }
                }).fail(function (e) {
                    console.log(e);
                }).always(function () {
                    window.location.reload();
                });
            });
        });
    </script>
@endsection