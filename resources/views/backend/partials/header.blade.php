<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
    <li class="xn-icon-button">
        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
    </li>
    <li class="">
        <a href="{{url('/')}}" target="_blank"><span class="fa fa-external-link"></span> <span class="xn-text">@lang('common.visit')</span></a>
    </li>
    <li class="xn-openable"><a href="#"><span class="fa fa fa-flag"></span> <span class="xn-text">@lang('common.language')</span></a>
        <ul class="animated zoomIn">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </li>
    <li class="xn-icon-button pull-right">
        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
    </li>
    <li class="xn-icon-button pull-right">
        <a href="#"><span class="fa fa-bell-o"></span></a>
        <div class="informer informer-danger">4</div>
        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="fa fa-bell-o"></span> Notification</h3>
                <div class="pull-right">
                    <span class="label label-danger">4 new</span>
                </div>
            </div>
            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                <a href="#" class="list-group-item">
                    <div class="list-group-status status-online"></div>
                    <img src="{{asset('themes/admin/assets/images/users/user2.jpg')}}" class="pull-left" alt="John Doe"/>
                    <span class="contacts-title">John Doe</span>
                    <p>Praesent placerat tellus id augue condimentum</p>
                </a>
                <a href="#" class="list-group-item">
                    <div class="list-group-status status-away"></div>
                    <img src="{{asset('themes/admin/assets/images/users/user.jpg')}}" class="pull-left" alt="Dmitry Ivaniuk"/>
                    <span class="contacts-title">Dmitry Ivaniuk</span>
                    <p>Donec risus sapien, sagittis et magna quis</p>
                </a>
                <a href="#" class="list-group-item">
                    <div class="list-group-status status-away"></div>
                    <img src="{{asset('themes/admin/assets/images/users/user3.jpg')}}" class="pull-left" alt="Nadia Ali"/>
                    <span class="contacts-title">Nadia Ali</span>
                    <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                </a>
                <a href="#" class="list-group-item">
                    <div class="list-group-status status-offline"></div>
                    <img src="{{asset('themes/admin/assets/images/users/user6.jpg')}}" class="pull-left" alt="Darth Vader"/>
                    <span class="contacts-title">Darth Vader</span>
                    <p>I want my money back!</p>
                </a>
            </div>
            <div class="panel-footer text-center">
                <a href="pages-messages.html">Show all notifications</a>
            </div>
        </div>
    </li>
</ul>