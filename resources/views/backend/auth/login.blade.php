<!DOCTYPE html>
<html lang="{{config('app.locale')}}" class="body-full-height">
<head>
    <title>{{$title}} | {{config('app.name')}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="{{config('app.description')}}" />
    <meta name="keywords" content="{{config('app.keywords')}}" />
    <meta name="author" content="{{config('app.author')}}" />
    <link rel="shortcut icon" href="{{asset('themes/'.config('app.themes').'/images/favicons/favicon.png')}}" type="image/x-icon">
    {{ Html::style(asset('themes/admin/css/theme-blue.css'), ['id' => 'theme']) }}
    <style>
        .check {
            font-weight: 600;
            color: white;
        }
        .nopadding { padding: 0; }
    </style>
</head>
<body>
<div class="login-container">
    <div class="login-box animated fadeInDown">
        <div class="login-logo"></div>
        <div class="login-body">
            <div class="login-title">@lang('auth.welcome')</div>
            @include('backend.errors.list')
            <form action="{{route('admin.login')}}" class="form-horizontal" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('email', old('email'),['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => __('placeholder.login_email')]); !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::password('password', ['class' => 'form-control', 'autocomplete' => 'new-password', 'placeholder' => __('placeholder.login_password')]); !!}
                    </div>
                </div>
                @if(config('app.captcha') == true)
                    <div class="form-group">
                        <div class="col-lg-6 col-xs-12">
                            <input type="text" name="captcha" class="form-control col-lg-3 form-control-solid placeholder-no-fix" autocomplete="off" placeholder="@lang('placeholder.captcha')">
                        </div>
                        <div class="col-lg-6 col-xs-12">
                            {!! captcha_img('flat') !!}
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-info btn-block">@lang('auth.login')</button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label class="check"><input type="checkbox" name="remember" class="icheckbox"/> Remember me</label>
                    </div>
                    <div class="col-md-6 text-right nopadding">
                        <a href="#" class="btn btn-link">@lang('auth.forget_pass')</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="login-footer">
            <div class="pull-left">
                {{config('app.alias')}} &copy; Copyright {{date('Y')}} - All Right Reserved.
            </div>
        </div>
    </div>
</div>
{{ Html::script(asset('themes/admin/js/plugins/jquery/jquery.min.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/bootstrap/bootstrap.min.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/icheck/icheck.min.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/noty/jquery.noty.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/noty/layouts/bottomRight.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/noty/themes/default.js'), ['type' => 'text/javascript']) }}
<script type="text/javascript">
    $('document').ready(function () {
        @if(session()->has('message'))
            @if(session('type') == 'error')
                noty({text: "<i class='fa fa-times-circle'></i> {{session('message')}}", layout: "bottomRight", type: "error"});
            @endif
            @if(session('type') == 'warning')
                noty({text: "<i class='fa fa-exclamation-circle'></i> {{session('message')}}", layout: "bottomRight", type: "warning"});
            @endif
        @endif
    });
</script>
</body>
</html>






