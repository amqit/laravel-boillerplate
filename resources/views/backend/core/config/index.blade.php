@extends('backend.container.layout')
@section('title', $title)
@section('breadcrumbs')
    {{ Breadcrumbs::render('configuration') }}
    <div class="page-title">
        <h2><span class="fa fa-cogs"></span> @lang('module.config_title')</h2>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$title}}</h3>
                    <ul class="panel-controls">
                        <li><a href="{{route('admin.dashboard')}}" data-toggle="tooltip" data-placement="top" data-original-title="@lang('button.btn_back')"><span class="fa fa-arrow-left"></span></a></li>
                    </ul>
                </div>
                {!! Form::open(['url' => 'setting/system/configuration/store','class' => 'form-horizontal form-label-left','novalidate','files'=>'true']) !!}
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="item form-group">
                                {!! Form::label('app_keyword', 'Configuration',['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    {!! Form::textarea('app_keyword', $conf,['class' => 'form-control','rows' => 15]); !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
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
    <script type="text/javascript">
        $(document).ready(function () {
        });
    </script>
@stop