@inject('AppHelpers', '\App\Libraries\AppHelpers')
@extends('backend.container.layout')
@section('title', $title)
@section('breadcrumbs')
    {{ Breadcrumbs::render('groups_access') }}
    <div class="page-title">
        <h2><span class="fa fa-table"></span> @lang('module.access')</h2>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$title}}</h3>
                    <ul class="panel-controls">
                        <li><a href="{{ route('admin.system.groups.index') }}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('button.btn_back')"><span class="fa fa-arrow-left"></span></a></li>
                        <li><a href="#" onclick="toggle(1)" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.expand')"><span class="fa fa-arrow-down"></span></a></li>
                        <li><a href="#" onclick="toggle(0)" data-toggle="tooltip" data-placement="top" data-original-title="@lang('common.collapse')"><span class="fa fa-arrow-up"></span></a></li>
                    </ul>
                </div>
                {!! Form::open(['route' => 'admin.system.groups.permission','class' => 'form-horizontal form-label-left','novalidate','files'=>'true']) !!}
                <div class="panel-body">
                    <div class="table-responsive">
                        <input type="hidden" name="group_id" value="{{$id}}">
                        <table class="table table-hover table-bordered order-column">
                                <thead>
                                <tr>
                                    <th width="20">#</th>
                                    <th>Menu</th>
                                    <th width="100"><label><input type="checkbox" class="checkread"> Read</label></th>
                                    <th width="100"><label><input type="checkbox" class="checkadd"> Create</label></th>
                                    <th width="100"><label><input type="checkbox" class="checkedit"> Update</label></th>
                                    <th width="100"><label><input type="checkbox" class="checkdel"> Delete</label></th>
                                    <th width="100"><label><input type="checkbox" class="checkapprove"> Approval</label></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menu as $key1 => $parent)
                                    <tr>
                                        <td>
                                            @if(count($parent['level1']) > 0)<a href="javascript:;" class="show_detail" data-id="{{$parent['id']}}"
                                                                                data-status="0"><i id="parent{{$parent['id']}}" class="fa fa-plus"></i></a>@endif
                                        </td>
                                        <td>{{$parent['menu_name']}}</td>
                                        <td align="center">
                                            <input type="checkbox" name="is_read[]"
                                                   value="is_read+{{$parent['id']}}" @if($parent['checked']['is_read'] == 1) {{'checked'}} @endif>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="is_create[]"
                                                   value="is_create+{{$parent['id']}}" @if($parent['checked']['is_create'] == 1) {{'checked'}} @endif>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="is_update[]"
                                                   value="is_update+{{$parent['id']}}" @if($parent['checked']['is_update'] == 1) {{'checked'}} @endif>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="is_delete[]"
                                                   value="is_delete+{{$parent['id']}}" @if($parent['checked']['is_delete'] == 1) {{'checked'}} @endif>
                                        </td>
                                        <td align="center">
                                            <input type="checkbox" name="is_approve[]"
                                                   value="is_approve+{{$parent['id']}}" @if($parent['checked']['is_approve'] == 1) {{'checked'}} @endif>
                                        </td>
                                    </tr>
                                    @if($parent['level1'])
                                        @foreach($parent['level1'] as $key2 => $level1)
                                            <tr class="parent_{{$parent['id']}} hide_child">
                                                <td>
                                                    @if(count($level1['level2']) > 0)<a href="javascript:;" class="show_detail" data-id="{{$level1['id']}}"
                                                                                        data-status="0"><i id="parent{{$level1['id']}}" class="fa fa-plus"></i></a>@endif
                                                </td>
                                                <td style="text-indent: 30px">{{$level1['menu_name']}}</td>
                                                <td align="center">
                                                    <input type="checkbox" name="is_read[]"
                                                           value="is_read+{{$level1['id']}}" @if($level1['checked']['is_read'] == 1) {{'checked'}} @endif>
                                                </td>
                                                <td align="center">
                                                    <input type="checkbox" name="is_create[]"
                                                           value="is_create+{{$level1['id']}}" @if($level1['checked']['is_create'] == 1) {{'checked'}} @endif>
                                                </td>
                                                <td align="center">
                                                    <input type="checkbox" name="is_update[]"
                                                           value="is_update+{{$level1['id']}}" @if($level1['checked']['is_update'] == 1) {{'checked'}} @endif>
                                                </td>
                                                <td align="center">
                                                    <input type="checkbox" name="is_delete[]"
                                                           value="is_delete+{{$level1['id']}}" @if($level1['checked']['is_delete'] == 1) {{'checked'}} @endif>
                                                </td>
                                                <td align="center">
                                                    <input type="checkbox" name="is_approve[]"
                                                           value="is_approve+{{$level1['id']}}" @if($level1['checked']['is_approve'] == 1) {{'checked'}} @endif>
                                                </td>
                                            </tr>
                                            @if($level1['level2'])
                                                @foreach($level1['level2'] as $key3 => $level2)
                                                    <tr class="parent_{{$level1['id']}} hide_child">
                                                        <td>
                                                            @if(count($level2['level3']) > 0)<a href="javascript:;" class="show_detail" data-id="{{$level2['id']}}"
                                                                                                data-status="0"><i id="parent{{$level2['id']}}" class="fa fa-plus"></i></a>@endif
                                                        </td>
                                                        <td style="text-indent: 60px">{{$level2['menu_name']}}</td>
                                                        <td align="center">
                                                            <input type="checkbox" name="is_read[]"
                                                                   value="is_read+{{$level2['id']}}" @if($level2['checked']['is_read'] == 1) {{'checked'}} @endif>
                                                        </td>
                                                        <td align="center">
                                                            <input type="checkbox" name="is_create[]"
                                                                   value="is_create+{{$level2['id']}}" @if($level2['checked']['is_create'] == 1) {{'checked'}} @endif>
                                                        </td>
                                                        <td align="center">
                                                            <input type="checkbox" name="is_update[]"
                                                                   value="is_update+{{$level2['id']}}" @if($level2['checked']['is_update'] == 1) {{'checked'}} @endif>
                                                        </td>
                                                        <td align="center">
                                                            <input type="checkbox" name="is_delete[]"
                                                                   value="is_delete+{{$level2['id']}}" @if($level2['checked']['is_delete'] == 1) {{'checked'}} @endif>
                                                        </td>
                                                        <td align="center">
                                                            <input type="checkbox" name="is_approve[]"
                                                                   value="is_approve+{{$level2['id']}}" @if($level2['checked']['is_approve'] == 1) {{'checked'}} @endif>
                                                        </td>
                                                    </tr>
                                                    @if($level2['level3'])
                                                        @foreach($level2['level3'] as $key4 => $level3)
                                                            <tr class="parent_{{$level2['id']}} hide_child">
                                                                <td>
                                                                    @if(count($level3['level4']) > 0)<a href="javascript:;" class="show_detail" data-id="{{$level3['id']}}"
                                                                                                        data-status="0"><i id="parent{{$level3['id']}}" class="fa fa-plus"></i></a>@endif
                                                                </td>
                                                                <td style="text-indent: 90px">{{$level3['menu_name']}}</td>
                                                                <td align="center">
                                                                    <input type="checkbox" name="is_read[]"
                                                                           value="is_read+{{$level3['id']}}" @if($level3['checked']['is_read'] == 1) {{'checked'}} @endif>
                                                                </td>
                                                                <td align="center">
                                                                    <input type="checkbox" name="is_create[]"
                                                                           value="is_create+{{$level3['id']}}" @if($level3['checked']['is_create'] == 1) {{'checked'}} @endif>
                                                                </td>
                                                                <td align="center">
                                                                    <input type="checkbox" name="is_update[]"
                                                                           value="is_update+{{$level3['id']}}" @if($level3['checked']['is_update'] == 1) {{'checked'}} @endif>
                                                                </td>
                                                                <td align="center">
                                                                    <input type="checkbox" name="is_delete[]"
                                                                           value="is_delete+{{$level3['id']}}" @if($level3['checked']['is_delete'] == 1) {{'checked'}} @endif>
                                                                </td>
                                                                <td align="center">
                                                                    <input type="checkbox" name="is_approve[]"
                                                                           value="is_approve+{{$level3['id']}}" @if($level3['checked']['is_approve'] == 1) {{'checked'}} @endif>
                                                                </td>
                                                            </tr>
                                                            @if($level3['level4'])
                                                                @foreach($level3['level4'] as $key5 => $level4)
                                                                    <tr class="parent_{{$level3['id']}} hide_child">
                                                                        <td><span style="color: #7F8FA4">{{$level4['id']}}</span>
                                                                        </td>
                                                                        <td style="text-indent: 130px">{{$level4['menu_name']}}</td>
                                                                        <td align="center">
                                                                            <input type="checkbox" name="is_read[]"
                                                                                   value="is_read+{{$level4['id']}}" @if($level4['checked']['is_read'] == 1) {{'checked'}} @endif>
                                                                        </td>
                                                                        <td align="center">
                                                                            <input type="checkbox" name="is_create[]"
                                                                                   value="is_create+{{$level4['id']}}" @if($level4['checked']['is_create'] == 1) {{'checked'}} @endif>
                                                                        </td>
                                                                        <td align="center">
                                                                            <input type="checkbox" name="is_update[]"
                                                                                   value="is_update+{{$level4['id']}}" @if($level4['checked']['is_update'] == 1) {{'checked'}} @endif>
                                                                        </td>
                                                                        <td align="center">
                                                                            <input type="checkbox" name="is_delete[]"
                                                                                   value="is_delete+{{$level4['id']}}" @if($level4['checked']['is_delete'] == 1) {{'checked'}} @endif>
                                                                        </td>
                                                                        <td align="center">
                                                                            <input type="checkbox" name="is_approve[]"
                                                                                   value="is_approve+{{$level4['id']}}" @if($level4['checked']['is_approve'] == 1) {{'checked'}} @endif>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{route('admin.system.groups.index')}}" class="btn btn-danger" type="button"><i class="fa fa-close"></i> @lang('button.cancel')</a>
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> @lang('button.save') </button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('append_js')
    <script type="text/javascript">
        function toggle(toggle) {
            toggle == 'undefined' ? toggle = 0 : toggle = toggle;
            if (toggle == 1) {
                $('.show_detail').attr('data-status', '0');
                $('.show_detail').click();
            } else {
                $('.show_detail').attr('data-status', '1');
                $('.show_detail').click();
            }
        }
        $(document).ready(function () {
            $('.hide_child').hide();
            $('.show_detail').click(function () {
                var id = $(this).attr('data-id');
                var status = $(this).attr('data-status');
                if (status == 0) {
                    $(this).attr('data-status', '1');
                    $(".parent_" + id).show('fast');
                    $("#parent" + id).removeClass('fa fa-plus').addClass('fa fa-minus');
                } else {
                    $(this).attr('data-status', '0');
                    $(".parent_" + id).hide('fast');
                    $("#parent" + id).removeClass('fa fa-minus').addClass('fa fa-plus');
                }
            });

            $('.checkread').change(function () {
                var checked = $(this).prop('checked');
                $('.table').find('input[name*="is_read[]"]').prop('checked', checked);
            });
            $('.checkadd').change(function () {
                var checked = $(this).prop('checked');
                $('.table').find('input[name*="is_create[]"]').prop('checked', checked);
            });
            $('.checkedit').change(function () {
                var checked = $(this).prop('checked');
                $('.table').find('input[name*="is_update[]"]').prop('checked', checked);
            });
            $('.checkdel').change(function () {
                var checked = $(this).prop('checked');
                $('.table').find('input[name*="is_delete[]"]').prop('checked', checked);
            });
            $('.checkapprove').change(function () {
                var checked = $(this).prop('checked');
                $('.table').find('input[name*="is_approve[]"]').prop('checked', checked);
            });
        });
    </script>
@endsection