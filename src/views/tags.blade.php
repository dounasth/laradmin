@extends('laradmin::layout')

@section('page-title')
List Tags
@stop

@section('page-subtitle')

@stop

@section('breadcrumb')
@parent
    <li class="active">List Tags</li>
@stop

@section('page-menu')
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
    <th>ID</th>
    <th>Tag</th>
    <th>Slug</th>
    <th>Count</th>
</tr>
</thead>
<tbody>
@foreach ($tags as $tag)
<tr>
    <td>{{ $tag->id }}</td>
    <td>{{ $tag->name }}</td>
    <td>{{ $tag->slug }}</td>
    <td>{{ $tag->count }}</td>
</tr>
@endforeach
</tbody>
<tfoot>
<tr>
    <th>ID</th>
    <th>Tag</th>
    <th>Slug</th>
    <th>Count</th>
</tr>
</tfoot>
</table>
</div>
</div>
@stop