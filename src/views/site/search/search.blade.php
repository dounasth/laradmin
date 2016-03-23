@extends('laradmin::site.site-layout')

@section('page-title')
{{Config::get('laradmin::site.name')}}
@stop

@section('page-subtitle')
@stop

@section('styles')
@stop

@section('content')

<div class="container headerOffset">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            @foreach ($search as $key => $group)
                <li class=""><a href="#tab-{{$key}}" data-toggle="tab">{{$group['title']}} ({{ method_exists($group['items'],'getTotal') ? $group['items']->getTotal() : $group['items']->count() }})</a></li>
            @endforeach
        </ul>
        <div class="tab-content clearfix">
            {{--@foreach($search as $group)--}}
                {{--@include('laradmin::site.search.parts.loop', ['group'=>$group])--}}
            {{--@endforeach--}}
            @each('laradmin::site.search.parts.loop', $search, 'group', 'laradmin::site.search.parts.no-data')
        </div>
    </div>
</div>

@stop