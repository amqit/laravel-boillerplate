<div class="container-fluid">
    <div class="row login-box">
        <div class="col-md-6">
            <h4>@lang('text.with_socmed')</h4>
            <ul class="social-link">
                <li><button class="icon-divided ti-facebook fb-color"><span>@lang('text.facebook')</span></button></li>
                <li><button class="icon-divided ti-twitter tw-color"><span>@lang('text.twitter')</span></button></li>
                <li><button class="icon-divided ti-google gplus-color"><span>@lang('text.gplus')</span></button></li>
            </ul>
            <p class="login-notif">(@lang('text.login_notif'))</p>
        </div>
        <div class="col-md-6 divider-left">
            <h4>@lang('text.with_email')</h4>
            <form action="{{route('frontend.auth.login.post')}}" class="form-horizontal" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('email', old('email'),['required' => 'required', 'class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => __('placeholder.login_email')]); !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::password('password', ['required' => 'required', 'class' => 'form-control', 'autocomplete' => 'new-password', 'placeholder' => __('placeholder.login_password')]); !!}
                    </div>
                </div>
                @if(config('app.captcha') == true)
                    <div class="form-group">
                        <div class="col-lg-7 col-xs-7">
                            <input type="text" name="captcha" class="form-control col-lg-3 form-control-solid placeholder-no-fix" autocomplete="off" placeholder="@lang('placeholder.captcha')">
                        </div>
                        <div class="col-lg-5 col-xs-5" style="padding-left: 0">
                            {!! captcha_img('inverse') !!}
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <div class="col-lg-8 col-xs-12 pull-right">
                        <a href="#" class="btn btn-link btn-block pull-right">@lang('auth.forget_pass')</a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6 col-xs-12 pull-right">
                        <button class="btn btn-danger btn-block">@lang('auth.login') <i class="glyphicon glyphicon-log-in"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <p class="sign-up-link">
                @lang('auth.no_account') <a href="#" onclick="appModal('{{url('register')}}','@lang("text.signup_title")',null)">@lang('auth.signup_here')</a>
            </p>
        </div>
    </div>
</div>




