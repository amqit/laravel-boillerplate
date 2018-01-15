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
                        <li><a href="{{route('admin.system.groups.index')}}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('button.btn_back')"><span class="fa fa-arrow-left"></span></a></li>
                    </ul>
                </div>
                {!! Form::open(['route' => 'admin.system.groups.store','id' => 'appForm', 'class' => 'form-horizontal','novalidate' => 'novalidate']) !!}
                <div class="panel-body">
                    @include('backend.errors.list')
                    <div class="form-group {{ $errors->has('module') ? ' has-error' : '' }}">
                        {!! Form::label('name', __('forms.group_name').' *',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('name', @$name ? @$name : old('name'),['required' => 'required', 'class' => 'form-control']); !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', __('text.description'),['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::textarea('description', @$description ? @$description : old('description'),['class' => 'form-control','rows' => 3]); !!}
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            {!! Form::hidden('secure_id', @$secure_id) !!}
                            <a href="{{route('admin.system.groups.index')}}" class="btn btn-danger" type="button"><i class="fa fa-close"></i> @lang('button.cancel')</a>
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
@endsection