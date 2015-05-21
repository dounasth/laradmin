@extends('laradmin::layout')

@section('page-title')
Manage Users
@stop

@section('page-subtitle')
dashboard subtitle, some description must be here
@stop

@section('breadcrumb')
@parent
    <li class="active">Manage Users</li>
@stop

@section('page-menu')
<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('add_user') }}"><i class="fa fa-plus"></i> Add a new user</a></li>
<li role="presentation" class="divider"></li>
<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-trash-o"></i> Delete selected users</a></li>
@stop

@section('styles')
<!-- DATA TABLES -->
<link href="{{ Config::get('laradmin::general.asset_path') }}/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@stop

@section('scripts')
<!-- DATA TABES SCRIPT -->
<script src="{{ Config::get('laradmin::general.asset_path') }}/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="{{ Config::get('laradmin::general.asset_path') }}/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("#example1").dataTable();
    });
</script>
@stop

@section('content')
<div class="box box-primary">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
    <th>&nbsp;</th>
    <th>ID</th>
    <th>E-mail</th>
    <th>Name</th>
    <th>Lastname</th>
    <th>Activated</th>
    <th>&nbsp;</th>
</tr>
</thead>
<tbody>
@foreach ($users as $user)
<tr>
    <td><input type="checkbox" value="{{ $user->id }}"></td>
    <td>{{ $user->id }}</td>
    <td><a href="{{route('edit_user', [$user->id])}}">{{ $user->email }}</a></td>
    <td><a href="{{route('edit_user', [$user->id])}}">{{ $user->first_name }}</a></td>
    <td><a href="{{route('edit_user', [$user->id])}}">{{ $user->last_name }}</a></td>
    <td>{{ $user->activated }}</td>
    <td>
        <a class="btn btn-flat btn-info" href="{{route('edit_user', [$user->id])}}"><i class="fa fa-edit"></i> {{trans('laradmin::actions.edit')}}</a>
        <a class="btn btn-flat btn-danger" href="{{route('delete_user', [$user->id])}}"><i class="fa fa-edit"></i> {{trans('laradmin::actions.delete')}}</a>
    </td>
</tr>
@endforeach
</tbody>
<tfoot>
<tr>
    <th>&nbsp;</th>
    <th>ID</th>
    <th>E-mail</th>
    <th>Name</th>
    <th>Lastname</th>
    <th>Activated</th>
    <th>&nbsp;</th>
</tr>
</tfoot>
</table>
</div>
</div>
@stop