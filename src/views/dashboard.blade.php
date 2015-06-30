@extends('laradmin::layout')

@section('page-title')
Dashboard
@stop

@section('page-subtitle')
dashboard subtitle, some description must be here
@stop

@section('content')
<section class="content">
    <div class="row">
        @foreach ($widgets as $widget)
        {{$widget}}
        @endforeach
    </div>
</section>
@stop