@extends('laradmin::layout')

@section('page-title')
@if ($mode == 'add')
Add User
@else
Edit User :: {{ $user->name }}
@endif
@stop

@section('page-subtitle')
dashboard subtitle, some description must be here
@stop

@section('breadcrumb')
@parent
    <li><a href="{{ route('users') }}" class="goOnCancel"><i class="fa fa-group"></i> Manage Users</a></li>
    <li class="active">{{ ($mode == 'add') ? 'Add' : 'Edit' }} user</li>
@stop

@section('page-menu')
<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('resend_activation', [$user->id]) }}"><i class="fa fa-plus"></i> Resend Activation Mail</a></li>
<li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('reset_password', [$user->id])}}"><i class="fa fa-trash-o"></i> Reset password</a></li>
<li role="presentation" class="divider"></li>
<li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('delete_user', [$user->id])}}"><i class="fa fa-trash-o"></i> Delete user</a></li>
@stop

@section('content')
<div class="box box-warning">
    <form role="form" method="post" action="{{ ($mode == 'add') ? route('add_user') : route('edit_user', [$user->id]) }}">
        <div class="box-body">
            <div class="row">
                <div class="col-lg-8 col-xs-12">
                    <h3>User Data</h3>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-xs-12">
                                <label for="first_name">First name</label>
                                <input type="text" id="first_name" placeholder="User's first name" class="form-control" name="user[first_name]" value="{{ $user->first_name }}">
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <label for="last_name">Last name</label>
                                <input type="text" id="last_name" placeholder="User's last name" class="form-control" name="user[last_name]" value="{{ $user->last_name }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ trans('laradmin::generic.email') }}</label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input id="email" type="text" placeholder="Email" class="form-control" name="user[email]" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password1">Password</label>
                        <input type="password" placeholder="Password" id="password1" class="form-control" name="user[password]">
                        <br/>
                        <input type="password" placeholder="Password again. Leave empty to keep same password" id="password2" class="form-control" name="verify_password">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4 col-xs-12">
                                <label for="activated">Status</label>
                                <select id="activated" name="user[activated]" class="form-control">
                                    <option value="1" {{ ($user->activated) ? 'selected="selected"' : '' }} >Activated</option>
                                    <option value="0" {{ (!$user->activated) ? 'selected="selected"' : '' }} >Disabled</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-xs-12">
                                <label for="activation_code">{{ trans('laradmin::generic.activation_code')}}</label>
                                <input type="text" id="activation_code" placeholder="Activation Code. Empty for activated users." class="form-control" name="user[activation_code]" value="{{ $user->activation_code }}">
                            </div>
                            <div class="col-lg-4 col-xs-12">
                                <label for="reset_password_code">{{ trans('laradmin::generic.reset_password_code')}}</label>
                                <input type="text" id="reset_password_code" class="form-control" name="user[reset_password_code]" value="{{ $user->reset_password_code }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    @if ($mode != 'add')
                        <h3>more info...</h3><br/>
                        Created: {{ $user->created_at }}<br/><br/>
                        Updated: {{ $user->updated_at }}<br/><br/>
                        Activated At: {{ $user->activated_at }}<br/><br/>
                        Persist Code: {{ $user->persist_code }}<br/><br/>
                        Remember Token: {{ $user->remember_token }}<br/><br/>
                        Usergroups: @forelse ($user->getGroups() as $k => $group)
                        <a href="{{ route('edit_usergroup', [$group->id]) }}">{{ $group->name }}</a>
                        @if ( $k < count($user->getGroups())-1 )
                        ,
                        @endif
                        @empty
                        {{ trans('laradmin::generic.no_groups_assigned') }}
                        @endforelse<br/><br/>
                        Permissions: @forelse($user->getMergedPermissions() as $permission=>$value)
                        {{ $permission }} /
                        @empty
                        {{ trans('laradmin::generic.no_permissions_assigned') }}
                        @endforelse<br/><br/>
                    @endif
                </div>
            </div>
            @if ($mode != 'add')
            <div class="row">
                @if (count(User::find($user->id)->profiles))
                <div class="col-lg-12 col-xs-12">
                    <h3>Social Profiles</h3>
                    @foreach (User::find($user->id)->profiles as $profile)
                        {{niceprintr($profile->provider)}}
                    @endforeach
                </div>
                @endif
            </div>
            @endif
        </div><!-- /.box-body -->

        <div class="box-footer">
            <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> Save</button>
            <a class="btn btn-danger btn-cancel"><i class="fa fa-square-o"></i> Cancel</a>
            <button class="btn btn-warning pull-right" type="submit"><i class="fa fa-plus"></i> Save as new</button>
        </div>
    </form>
</div>
@stop