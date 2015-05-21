@extends('laradmin::layout')

@section('page-title')
Manage Usergroups
@stop

@section('page-subtitle')
dashboard subtitle, some description must be here
@stop

@section('breadcrumb')
@parent
    <li class="active">Manage Usergroups</li>
@stop

@section('page-menu')
<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('add_usergroup') }}"><i class="fa fa-plus"></i> Add a new usergroup</a></li>
<li role="presentation" class="divider"></li>
<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-trash-o"></i> Delete selected usergroups</a></li>
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
    <th>Name</th>
    <th>Permissions</th>
    <th>Created at</th>
    <th>Updated at</th>
</tr>
</thead>
<tbody>
@foreach ($groups as $group)
<tr>
    <td><input type="checkbox" value="{{ $group->id }}"></td>
    <td>{{ $group->id }}</td>
    <td>{{ $group->name }}</td>
    <td>
        @forelse($group->getPermissions() as $permission=>$value)
        {{ $permission }} /
        @empty
        {{ trans('laradmin::generic.no_permissions_assigned') }}
        @endforelse
    </td>
    <td>{{ $group->created_at }}</td>
    <td>
        {{ $group->updated_at }}
        <a class="btn btn-flat btn-info" href="{{route('edit_usergroup', [$group->id])}}"><i class="fa fa-edit"></i> {{trans('laradmin::actions.edit')}}</a>
        <a class="btn btn-flat btn-danger" href="{{route('delete_usergroup', [$group->id])}}"><i class="fa fa-edit"></i> {{trans('laradmin::actions.delete')}}</a>
    </td>
</tr>
@endforeach
</tbody>
<tfoot>
<tr>
    <th>&nbsp;</th>
    <th>ID</th>
    <th>Name</th>
    <th>Permissions</th>
    <th>Created at</th>
    <th>Updated at</th>
</tr>
</tfoot>
</table>
</div>
</div>
@stop