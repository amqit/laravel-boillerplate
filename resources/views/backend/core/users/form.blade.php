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
                        <li><a href="{{route('admin.system.users.index')}}" data-toggle="tooltip" data-placement="top"
                               data-original-title="@lang('button.btn_back')"><span class="fa fa-arrow-left"></span></a>
                        </li>
                    </ul>
                </div>
                <div class="panel-body">
                    @include('backend.errors.list')
                    {!! Form::open(['route' => 'admin.system.users.store','id' => 'appForm','class' => 'form-horizontal','novalidate' => 'novalidate','files'=>'true']) !!}
                    <div class="form-group {{ $errors->has('module') ? ' has-error' : '' }}">
                        {!! Form::label('fullname', __('forms.user_fullname').' *',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']); !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('fullname', @$fullname ? @$fullname : old('fullname'), ['required' => 'required', 'class' => 'form-control', 'data-validate' => '']); !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('module') ? ' has-error' : '' }}">
                        {!! Form::label('email', __('text.email').' *',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']); !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::email('email', @$email ? @$email : old('email'), ['required' => 'required', 'class' => 'form-control']); !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('module') ? ' has-error' : '' }}">
                        {!! Form::label('username', __('auth.username').' *',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']); !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('username', @$username ? @$username : old('username'),['data-validate-length-range' => '5,10', 'autocomplete' => 'off', 'data-validate' => '', 'readonly' => @$username ? true : false, 'required' => 'required', 'class' => 'form-control']); !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('module') ? ' has-error' : '' }}">
                        {!! Form::label('group_id', __('module.group').' *',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']); !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('group_id', [], @$group_id ? @$group_id : old('group_id'), ['id' => 'group_id', 'required' => 'required', 'class' => 'form-control select2', 'data-validate' => '']); !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', __('auth.password'),['class' => 'control-label col-md-3 col-sm-3 col-xs-12']); !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::password('password', ['required' => 'required', 'autocomplete' => 'new-password', 'class' => 'form-control', 'placeholder' => __('passwords.leave_blank')]); !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('password_confirmation', __('auth.password_retype'),['class' => 'control-label col-md-3 col-sm-3 col-xs-12']); !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::password('password_confirmation', ['required' => 'required', 'class' => 'form-control', 'placeholder' => __('passwords.confirm_pass')]); !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('active', __('common.status'),['class' => 'control-label col-md-3 col-sm-3 col-xs-12']); !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="check">
                                <input type="radio" class="icheckbox" name="active" id="is_active" value="1" {!! @$active == 1 ? 'checked' : '' !!}/> @lang('common.active') <span></span>
                            </label>
                            <label class="check">
                                <input type="radio" class="icheckbox" name="active" id="is_inactive" value="0" {!! @$active == 0 ? 'checked' : '' !!}/> @lang('common.inactive') <span></span>
                            </label>
                            <label class="check">
                                <input type="radio" class="icheckbox" name="active" id="is_blocked" value="2" {!! @$active == 0 ? 'checked' : '' !!}/> @lang('common.blocked') <span></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            {!! Form::hidden('secure_id', @$secure_id) !!}
                            <a href="{{route('admin.system.users.index')}}" class="btn btn-danger" type="button"><i class="fa fa-close"></i> @lang('button.cancel')</a>
                            @if(!@$secure_id)
                                <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> @lang('button.reset')</button>
                            @endif
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> @lang('button.save')</button>
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
            $('#group_id').jCombo("{{url('common/get_group/')}}", {
                selected_value: "{!! @$group_id !!}",
                initial_text: "{!! __('forms.user_group_choose') !!}"
            });

            @if(@$secure_id)
                $('#password').prop('required', false);
                $('#password_confirmation').prop('required', false);
            @endif
        });
    </script>
@stop
