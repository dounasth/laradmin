@extends('laradmin::layout')

@section('page-title')
Add a new Banner
@stop

@section('page-subtitle')
@stop

@section('breadcrumb')
@parent
<li class="active">Add a new Banner</li>
@stop

@section('page-menu')
@stop

@section('styles')
@stop

@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.4.5/ckeditor.js"></script>
@stop

@section('content')
<form role="form" method="post" action="{{ route('banners.save') }}" enctype="multipart/form-data">
<input type="hidden" name="id" value="0" />
<div class="box box-primary">
    <div class="box-body table-responsive">
        <div class="form-group parameter-row the-shippings">

            <div class="row">
                <div class="col-lg-3 col-xs-12">
                    <label>image</label>
                </div>
                <div class="col-lg-9 col-xs-12">
                    <input type="file" name="image" />
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-xs-12">
                    <label>title</label>
                </div>
                <div class="col-lg-9 col-xs-12">
                    <input type="text" class="form-control" name="banner[title]" value="{{ $banner->title }}">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-xs-12">
                    <label>type</label>
                </div>
                <div class="col-lg-9 col-xs-12">
                    <input type="text" class="form-control" name="banner[type]" value="{{ $banner->type }}">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-xs-12">
                    <label>url</label>
                </div>
                <div class="col-lg-9 col-xs-12">
                    <input type="text" class="form-control" name="banner[text]" value="{{ $banner->url }}">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-xs-12">
                    <label>text</label>
                </div>
                <div class="col-lg-9 col-xs-12">
                    <textarea class="form-control ckeditor" name="banner[text]">{{ $banner->text }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-xs-12">
                    <label>status</label>
                </div>
                <div class="col-lg-9 col-xs-12">
                    <select class="form-control" name="banner[status]" >
                        <option value="1" {{ $banner->status ? 'selected="selected"' : '' }} >Ενεργό</option>
                        <option value="0" {{ !$banner->status ? 'selected="selected"' : '' }} >Ανενεργό</option>
                    </select>
                </div>
            </div>

        </div>
    </div>
    <div class="">
        <div class="box-body table-responsive">
            <div class="box-footer">
                <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> Save</button>
                <a class="btn btn-danger btn-cancel"><i class="fa fa-square-o"></i> Cancel</a>
            </div>
        </div>
    </div>
</div>
</form>
@stop