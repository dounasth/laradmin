@extends('laradmin::layout')

@section('page-title')
Manage Settings
@stop

@section('page-subtitle')
for config: <b>{{ $configfile }}</b>
@stop

@section('breadcrumb')
@parent
<li class="active">Manage Settings</li>
@stop

@section('page-menu')
@stop

@section('scripts')
<script type="text/javascript" charset="utf-8">
    jQuery(document).ready(function(){
        jQuery('.add-parameter').click(function(e){
            e.preventDefault();
            var newParam = jQuery('.new-parameter-name').val();
            var row = jQuery('.parameter-row:last').clone(true);
            row.find('label').attr('for', newParam).text(newParam);
            row.find('input').val('').attr('id', newParam).attr('name', 'settings['+newParam+']');
            return false;
        });
    });
</script>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-body table-responsive">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control new-parameter-name">
                        <span class="input-group-btn">
                            <button class="add-parameter" type="button" class="btn btn-info btn-flat">Add parameter</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="box box-primary">
    <div class="box-body table-responsive">
        <form role="form" method="post" action="{{ route('settings_save') }}">
            <input type="hidden" name="configfile" value="{{$configfile}}"/>
            @foreach ($settings as $name => $value)
            <div class="form-group parameter-row">
                <div class="row">
                    <div class="col-lg-3 col-xs-12">
                        <label for="{{ $name }}">{{ $name }}</label>
                    </div>
                    <div class="col-lg-9 col-xs-12">
                        <input type="text" id="{{ $name }}" class="form-control" name="settings[{{ $name }}]" value="{{ $value }}">
                    </div>
                </div>
            </div>
            @endforeach
            <div class="box-footer">
                <button class="btn btn-success" type="submit"><i class="fa fa-check-square-o"></i> Save</button>
                <a class="btn btn-danger btn-cancel"><i class="fa fa-square-o"></i> Cancel</a>
            </div>
        </form>
    </div>
</div>
@stop