@extends('laradmin::layout')

@section('page-title')
View Permissions
@stop

@section('page-subtitle')
Here you can preview all the available permissions for your application. To edit, go to config file in the stated package.
@stop

@section('breadcrumb')
@parent
    <li class="active">Manage Permissions</li>
@stop

@section('content')
<div class="box box-primary">
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
    <th>Permission</th>
    <th>Origin</th>
</tr>
</thead>
    <tbody>
@foreach ($permissions as $permission => $origin)
<tr>
    <td>{{ $permission }}</td>
    <td>{{ $origin }}</td>
</tr>
@endforeach
</tbody>
    <tfoot>
<tr>
    <th>Permission</th>
    <th>Origin</th>
</tr>
</tfoot>
</table>
</div>
</div>
@stop
