@inject('menus', 'App\Http\Controllers\Backend\Core\MenuController')
<div class="page-sidebar">
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="{{url('admin')}}">Joli Admin</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                @if(Gravatar::exists('rey_edenvolska@yahoo.com'))
                    <img src="{!! Gravatar::get('rey_edenvolska@yahoo.com'); !!}" alt="John Doe"/>
                @else
                    <img src="{{asset('themes/admin/assets/images/users/avatar.jpg')}}" alt="John Doe"/>
                @endif
            </a>
            <div class="profile">
                <div class="profile-image">
                    @if(Gravatar::exists('rey_edenvolska@yahoo.com'))
                        <img src="{!! Gravatar::get('rey_edenvolska@yahoo.com'); !!}" alt="John Doe"/>
                    @else
                        <img src="{{asset('themes/admin/assets/images/users/avatar.jpg')}}" alt="John Doe"/>
                    @endif
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{session('fullname')}}</div>
                    <div class="profile-data-title">{{session('group_name')}}</div>
                </div>
                <div class="profile-controls">
                    <a href="{{url('admin/profile')}}" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="{{url('admin/message')}}" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>
        </li>
        <li class="xn-title">Features</li>
        {!! $menus->generateAdminSideMenu('adminsidebar') !!}
    </ul>
</div>