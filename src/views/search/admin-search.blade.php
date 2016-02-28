@extends('laradmin::layout')

@section('page-title')
Dashboard
@stop

@section('page-subtitle')
dashboard subtitle, some description must be here
@stop

@section('content')
<!-- Custom tabs (Charts with tabs)-->
<div class="nav-tabs-custom">
    <!-- Tabs within a box -->
    <ul class="nav nav-tabs">
        @foreach ($search as $key => $group)
        <li class=""><a href="#tab-{{$key}}" data-toggle="tab">{{$group['title']}} ({{$group['items']->count()}})</a></li>
        @endforeach
    </ul>
    <div class="tab-content">
        @each('laradmin::search.parts.loop', $search, 'group', 'laradmin::search.parts.no-data')
    </div>
</div>
<!-- /.nav-tabs-custom -->


@stop