@extends('laradmin::layout')

@section('page-title')
Banners
@stop

@section('page-subtitle')
@stop

@section('breadcrumb')
@parent
<li class="active">Banners</li>
@stop

@section('page-menu')
<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('banners.add') }}"><i class="fa fa-plus"></i> Add a new banner</a></li>
@stop

@section('styles')
@stop

@section('scripts')
<script type="text/javascript">
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
                <th>Title</th>
                <th>Image</th>
                <th>Type</th>
                <th>Text</th>
                <th>URL</th>
                <th>Status</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($banners as $banner)
            <tr>
                <td><input type="checkbox" value="{{ $banner->id }}"></td>
                <td>{{ $banner->id }}</td>
                <td>{{ $banner->title }}</td>
                <td>
                    <a href="{{route('banners.edit', [$banner->id])}}">
                        <img border="0" src="{{ route('banner.image', [$banner->id]) }}" style="max-height: 200px;" />
                    </a>
                </td>
                <td>{{ $banner->type }}</td>
                <td><a href="{{route('banners.edit', [$banner->id])}}">{{ $banner->text }}</a></td>
                <td><a href="{{route('banners.edit', [$banner->id])}}">{{ $banner->url }}</a></td>
                <td>
                    @if ($banner->status)
                        <span class="label label-success">Ενεργό</span>
                    @else
                        <span class="label label-danger">Ανενεργό</span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-flat btn-info" href="{{route('banners.edit', [$banner->id])}}"><i class="fa fa-edit"></i> {{trans('laradmin::actions.edit')}}</a>
                    <a class="btn btn-flat btn-danger" href="{{route('banners.delete', [$banner->id])}}"><i class="fa fa-edit"></i> {{trans('laradmin::actions.delete')}}</a>
                </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>&nbsp;</th>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Type</th>
                <th>Text</th>
                <th>URL</th>
                <th>Status</th>
                <th>&nbsp;</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
@stop