@extends('laradmin::layout')

@section('page-title')
List Pages
@stop

@section('page-subtitle')

@stop

@section('breadcrumb')
@parent
<li class="active">List Pages</li>
@stop

@section('page-menu')
@stop

@section('styles')
@stop

@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.4.5/ckeditor.js"></script>
@stop

@section('content')


@section('content')
<header class="head">
    <div class="main-bar">
        <h3>
            <i class="glyphicon glyphicon-dashboard"></i>&nbsp; Manage Pages</h3>
    </div><!-- /.main-bar -->
</header><!-- /.head -->

<div class="box dark">
    <header>
        <div class="icons">
            <i class="fa fa-edit"></i>
        </div>
        <h5>{{ $actiontext }} Page</h5>
    </header>

    <div class="body collapse in form-horizontal">
        {{ Form::open(array('url' => route('pages.manage'))) }}
        {{ Form::hidden('id', $editpage->id) }}
        <div class="form-group">
            <label for="name" class="control-label col-lg-3">Title</label>
            <div class="col-lg-9">
                {{ Form::text('title', $editpage->title, array('id'=>'title', 'placeholder'=>'Type the title of the page here', 'class'=>'form-control')) }}
            </div>
        </div><!-- /.form-group -->
        <div class="form-group">
            <label for="php_file" class="control-label col-lg-3">Slug</label>
            <div class="col-lg-9">
                {{ Form::text('slug', $editpage->slug, array('id'=>'slug', 'placeholder'=>'Type the slug of the page here', 'class'=>'form-control')) }}
            </div>
        </div><!-- /.form-group -->
        <div class="form-group">
            <label for="status" class="control-label col-lg-3">Status</label>
            <div class="col-lg-9">
                {{ Form::select('status', array('A' => 'Active', 'D' => 'Disabled'), $editpage->status, array('id'=>'status', 'class'=>'form-control chzn-select', 'size'=>1)) }}
            </div>
        </div><!-- /.form-group -->
        <div class="form-group">
            <label for="status" class="control-label col-lg-3">Content</label>
            <div class="col-lg-9">
                {{ Form::textarea('content', $editpage->content, array('id'=>'content', 'class'=>'form-control ckeditor')) }}
            </div>
        </div><!-- /.form-group -->

        <div class="form-group">
            <div class="col-lg-9 col-lg-offset-3">
                <input type="submit" value="{{ $actiontext }} page" class="btn btn-primary">
            </div>
        </div>

        {{ Form::close() }}
    </div>
</div>


<div class="box dark">
    <header>
        <div class="icons">
            <i class="fa fa-edit"></i>
        </div>
        <h5>List of pages</h5>
    </header>
    <div class="body collapse in">
        <table class="table responsive-table">
            <thead>
            <tr>
                <th width="5%">#</th>
                <th width="70%">Title / slug</th>
                <th width="10%">Status</th>
                <th width="15%">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
            <tr>
                <td width="5%"><a href="{{ route('pages.manage', [$page->id]) }}">{{ $page->id }}</a></td>
                <td width="70%">
                    <a href="{{ route('pages.manage', [$page->id]) }}">{{ $page->title }} / ({{ $page->slug }})</a><br/>
                </td>
                <td width="10%">
                    ( <b>{{ ($page->status == 'A') ? 'Active' : 'Disabled' }}</b> )
                </td>
                <td width="15%">
                    <a href="{{ route('pages.manage', [$page->id]) }}" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{{ route('pages.delete', [$page->id]) }}" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
