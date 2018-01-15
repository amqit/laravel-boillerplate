@inject('AppHelpers', '\App\Libraries\AppHelpers')
@extends('backend.container.layout')
@section('title', $title)
@section('breadcrumbs')
    {{ Breadcrumbs::render('users') }}
@stop
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-body profile">
                    <div class="profile-image">
                        @if(Gravatar::exists($user->email))
                            <img src="{!! Gravatar::get($user->email); !!}" alt="John Doe"/>
                        @else
                            <img src="{{asset('themes/admin/assets/images/users/avatar.jpg')}}" alt="John Doe"/>
                        @endif
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name">{{@$user->fullname}}</div>
                        <div class="profile-data-title" style="color: #FFF;">Last Login: 12/12/2017 13:43</div>
                    </div>
                </div>
                <div class="panel-body list-group border-bottom">
                    <ul style="padding-left: 0;">
                        <li class="list-group-item"><label for="user_display">@lang('forms.user_display')</label><span class="pull-right">{{@$user->profile->display_name}}</span></li>
                        <li class="list-group-item"><label for="status">@lang('common.status')</label><span class="pull-right"> {!! $AppHelpers::getActive($user->active) !!}</span></li>
                        <li class="list-group-item"><label for="email">@lang('text.email')</label><span class="pull-right">{{$user->email}}</span></li>
                        <li class="list-group-item"><label for="group_id">@lang('text.group')</label><span class="pull-right">{{$user->group->name}}</span></li>
                        <li class="list-group-item"><label for="active">@lang('forms.user_birthdate')</label><span class="pull-right">{{@$user->profile->birthdate}}</span></li>
                        <li class="list-group-item"><label for="active">@lang('forms.user_age')</label><span class="pull-right">{{@$user->profile->age}}</span></li>
                        <li class="list-group-item"><label for="active">@lang('forms.user_sex')</label><span class="pull-right">{{@$user->profile->gender}}</span></li>
                        <li class="list-group-item"><label for="active">@lang('forms.user_handphone')</label><span class="pull-right">{{@$user->profile->handphone}}</span></li>
                        <li class="list-group-item"><label for="active">@lang('forms.user_telephone')</label><span class="pull-right">{{@$user->profile->telephone}}</span></li>
                        <li class="list-group-item"><label for="active">@lang('forms.user_address')</label><span class="pull-right">{{@$user->profile->address}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-rss-square"></i> Articles History</h3>
                    <ul class="panel-controls">
                        <li><a href="{{route('admin.system.users.index')}}" data-toggle="tooltip" data-placement="top"
                               data-original-title="@lang('button.btn_back')"><span class="fa fa-arrow-left"></span></a>
                        </li>
                    </ul>
                </div>
                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="grid-data">
                            <thead>
                            <tr>
                                <th>@lang('post.title')</th>
                                <th>@lang('post.posted_date')</th>
                                <th>@lang('post.reader')</th>
                                <th>@lang('common.status')</th>
                                <th width="15">@lang('common.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Lorem Ipsum</td>
                                <td>12/12/2017</td>
                                <td>17</td>
                                <td>Published</td>
                                <td>View</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
