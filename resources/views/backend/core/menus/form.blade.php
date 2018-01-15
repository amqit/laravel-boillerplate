@inject('AppHelpers', '\App\Libraries\AppHelpers')
@inject('hasMenu', '\App\Models\Core\MenuModel')
@extends('backend.container.layout')
@section('title', $title)
@section('breadcrumbs')
    {{ Breadcrumbs::render('menu') }}
    <div class="page-title">
        <h2><span class="fa fa-table"></span> @lang('module.menu_title')</h2>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-danger">
                {!! Form::open(['route' => 'admin.system.menus.store','id' => 'appForm', 'class' => 'form-horizontal','novalidate' => 'novalidate']) !!}
                <div class="panel-heading">
                    <h3 class="panel-title">{{$title}} <i class="fa fa-angle-double-right"></i>
                        <select name="locale" id="locale" class="select2-nosearch">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <option value="{{ $localeCode }}">{{ $properties['name'] }}</option>
                            @endforeach
                        </select>
                    </h3>
                    <ul class="panel-controls">
                        <li><a href="{{route('admin.system.menus.index')}}" data-toggle="tooltip" data-placement="top"
                               data-original-title="@lang('button.btn_back')"><span class="fa fa-arrow-left"></span></a>
                        </li>
                    </ul>
                </div>
                <div class="panel-body">
                    @include('backend.errors.list')
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        @php
                            $asterik = $localeCode == 'en' ? ' *' : '';
                            $menu[$localeCode] = null;
                            foreach($item->translation as $row):
                                if($row->locale == $localeCode):
                                    $menu[$localeCode] = $row->menu_title;
                                endif;
                            endforeach;
                        @endphp
                        <div class="form-group {{$localeCode}} {{ $errors->has('menu_title_en') ? ' has-error' : '' }}">
                            {!! Form::label('menu_title_'.$localeCode, __('forms.menu_name').' ('.$properties['name'].')'.$asterik,['class' => 'control-label col-lg-3 col-sm-3 col-xs-12']) !!}
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                {!! Form::text('menu_title_'.$localeCode, @$menu[$localeCode] ? @$menu[$localeCode] : old('menu_title'),['class' => 'form-control']); !!}
                            </div>
                        </div>
                    @endforeach
                    <div class="form-group {{ $errors->has('module') ? ' has-error' : '' }}">
                        {!! Form::label('module', __('forms.menu_route').' *',['class' => 'control-label col-lg-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            {!! Form::text('module', @$item->module ? @$item->module : old('module'),['required' => 'required', 'class' => 'form-control']); !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
                        {!! Form::label('url', __('forms.menu_url').' *',['class' => 'control-label col-lg-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            {!! Form::text('url', @$item->url ? @$item->url : old('url'),['required' => 'required', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('menu_type') ? ' has-error' : '' }}">
                        {!! Form::label('menu_position', __('forms.menu_position').' *',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']); !!}
                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            @foreach($groupMenus as $row)
                                <label class="check">
                                    <input type="radio" class="icheckbox" name="menu_type" id="{{$row->id}}"
                                           value="{{$row->menu_group_alias}}"
                                           @if(@$item->menu_type == $row->menu_group_alias) checked @elseif(@$type == $row->menu_group_alias) checked @endif /> {{$row->menu_group}}
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('parent_id', __('forms.menu_parent'),['class' => 'control-label col-lg-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            {!! Form::select('parent_id', [], null, ['class' => 'form-control select2']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('active', __('common.status'),['class' => 'control-label col-lg-3 col-sm-3 col-xs-12']); !!}
                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            <label class="check">
                                <input type="radio" class="icheckbox" name="active" id="is_active"
                                       value="1" {!! @$item->active == 1 ? 'checked' : '' !!}/> @lang('common.active')
                                <span></span>
                            </label>
                            <label class="check">
                                <input type="radio" class="icheckbox" name="active" id="is_inactive"
                                       value="0" {!! @$item->active == 0 ? 'checked' : '' !!}/> @lang('common.inactive')
                                <span></span>
                            </label>
                        </div>
                    </div>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        @php
                            $meta[$localeCode] = [
                                'meta_title' => null,
                                'meta_description' => null,
                            ];
                            foreach($item->translation as $row):
                                if($row->locale == $localeCode):
                                    $meta[$localeCode] = [
                                        'meta_title' => $row->meta_title,
                                        'meta_description' => $row->meta_description,
                                    ];
                                endif;
                            endforeach;
                        @endphp
                        <div class="form-group {{$localeCode}}">
                            {!! Form::label('meta_title_'.$localeCode, __('text.metadata').' ('.$properties['name'].')',['class' => 'control-label col-lg-3 col-sm-3 col-xs-12']) !!}
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                {!! Form::text('meta_title_'.$localeCode, @$meta[$localeCode]['meta_title'] ? @$meta[$localeCode]['meta_title'] : old('meta_title'),['class' => 'form-control']); !!}
                            </div>
                        </div>
                        <div class="form-group {{$localeCode}}">
                            {!! Form::label('meta_description_'.$localeCode, __('text.description').' ('.$properties['name'].')',['class' => 'control-label col-lg-3 col-sm-3 col-xs-12']) !!}
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                {!! Form::textarea('meta_description_'.$localeCode, @$meta[$localeCode]['meta_description'] ? @$meta[$localeCode]['meta_description'] : old('meta_description'),['class' => 'form-control','rows' => 3]); !!}
                            </div>
                        </div>
                    @endforeach
                    <div class="form-group">
                        {!! Form::label('menu_icons', __('text.icon'),['class' => 'control-label col-lg-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            {!! Form::text('menu_icons', @$item->menu_icons ? @$item->menu_icons : old('menu_icons'),['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('ordering', __('text.order'),['class' => 'control-label col-lg-3 col-sm-3 col-xs-12']); !!}
                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            {!! Form::number('ordering', @$item->ordering ? @$item->ordering : 0,['class' => 'form-control']); !!}
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            {!! Form::hidden('secure_id', @$secure_id) !!}
                            <a href="{{route('admin.system.menus.index')}}" class="btn btn-danger" type="button"><i
                                        class="fa fa-close"></i> @lang('button.cancel')</a>
                            @if(!@$secure_id)
                                <button type="reset" class="btn btn-warning"><i
                                            class="fa fa-refresh"></i> @lang('button.reset')</button>
                            @endif
                            <button type="submit" class="btn btn-success"><i
                                        class="fa fa-check"></i> @lang('button.save')</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
@section('append_js')
    {{ Html::script(asset('themes/admin/js/plugins/jcombo/jquery.jCombo.min.js'), ['type' => 'text/javascript']) }}
@stop
@section('custom_js')
    <script type="text/javascript">
        $('document').ready(function () {
            $('#parent_id').jCombo("{{url('common/get_menu/'.$type.'/'.@$secure_id)}}", {
                selected_value: "{!! @$item->parent_id !!}",
                initial_text: "{!! __('forms.menu_parent_choose') !!}"
            });
            $('#menu_title_en').prop('required', true);
            $('#menu_type').prop('required', true);
        });
    </script>
@stop
