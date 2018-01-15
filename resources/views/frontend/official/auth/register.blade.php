<div class="container-fluid">
        <div class="row login-box">
            <div class="col-md-6 divider">
                <h4>@lang('text.with_socmed')</h4>
                <ul class="social-link">
                    <li><button class="icon-divided ti-facebook fb-color"><span>@lang('text.facebook')</span></button></li>
                    <li><button class="icon-divided ti-twitter tw-color"><span>@lang('text.twitter')</span></button></li>
                    <li><button class="icon-divided ti-google gplus-color"><span>@lang('text.gplus')</span></button></li>
                </ul>
                <p class="login-notif">(@lang('text.login_notif'))</p>
            </div>
            <div class="col-md-6">
                <h4>@lang('text.with_email')</h4>
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            {!! Form::text('name', old('name'),['class' => 'form-control', 'required' => 'required', 'placeholder' => __('placeholder.login_name')]); !!}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            {!! Form::text('email', old('email'),['class' => 'form-control', 'required' => 'required', 'placeholder' => __('placeholder.login_email')]); !!}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            {!! Form::text('password', old('password'),['class' => 'form-control', 'required' => 'required', 'placeholder' => __('placeholder.login_password')]); !!}
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            {!! Form::text('password_confirmation', old('password_confirmation'),['class' => 'form-control', 'required' => 'required', 'placeholder' => __('placeholder.confirm_password')]); !!}
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6 col-xs-12 pull-right">
                            <button type="submit" class="btn btn-danger btn-block">@lang('auth.signup') <i class="glyphicon glyphicon-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p class="sign-up-link">
                    @lang('auth.have_account') <a href="#" onclick="appModal('{{url('login')}}','@lang("text.signin_title")',null)">@lang('auth.login_here')</a>
                </p>
            </div>
        </div>
    </div>
