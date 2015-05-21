@extends('laradmin::layout')

@section('page-title')
@if ($mode == 'add')
Add Usergroup
@else
Edit Usergroup :: {{ $group->name }}
@endif
@stop

@section('page-subtitle')
dashboard subtitle, some description must be here
@stop

@section('breadcrumb')
@parent
    <li><a href="{{ route('usergroups') }}" class="goOnCancel"><i class="fa fa-group"></i> Manage Usergroups</a></li>
    <li class="active">{{ ($mode == 'add') ? 'Add' : 'Edit' }} usergroup</li>
@stop

@section('page-menu')
@stop

@section('content')
<div class="box box-warning">
    <form role="form" method="post" action="{{ ($mode == 'add') ? route('add_usergroup') : route('edit_usergroup', [$group->id]) }}">
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">{{ trans('laradmin::generic.usergroup_name') }}</label>
                <input type="text" placeholder="{{ trans('laradmin::generic.usergroup_name_placeholder') }}" class="form-control" name="name" value="{{$group->name or ''}}">
            </div>
            <div class="form-group">
                <label>{{ trans('laradmin::generic.select_permissions') }}</label> <label><input type="checkbox" class="check-all" data-selector=".permission-check" /> <span>{{ trans('laradmin::generic.all') }}</span></label>
                <div class="form-group">
                    <div class="row">
                    @foreach (Config::get('laradmin::permissions.all') as $permission => $origin)
                        <div class="col-lg-2 col-xs-4">
                            <label><input type="checkbox" class="permission-check" {{ (isset($group->permissions) && isset($group->getPermissions()[$permission]) && $group->getPermissions()[$permission]) ? 'checked="checked"' : '' }} name="permissions[{{ $permission }}]" value="1"> {{ $permission }} ({{ $origin }})</label>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
            <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> Save</button>
            <a class="btn btn-danger btn-cancel"><i class="fa fa-square-o"></i> Cancel</a>
            <button class="btn btn-warning pull-right" type="submit"><i class="fa fa-plus"></i> Save as new</button>
        </div>
    </form>
</div>
@stop