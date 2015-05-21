@extends('laradmin::layout')

@section('page-title')
Manage Translations
@stop

@section('page-subtitle')
@if (!empty($selected_file['name']))
for lang file: <b>{{$selected_file['name']}}</b>
@endif
@stop

@section('breadcrumb')
@parent
<li class="active">Manage Translations</li>
@stop

@section('page-menu')
@stop

@section('scripts')
<script type="text/javascript" charset="utf-8">
    jQuery(document).ready(function () {
        jQuery('.add-parameters').click(function (e) {
            e.preventDefault();
            var newParams = jQuery('.new-parameter-name').val();
            newParams = newParams.split(',');
            for(i=0; i < newParams.length; i++){
                var newParam = newParams[i].split('=');
                name = ( newParam[0] != undefined && newParam[0].trim() ) != '' ? newParam[0].trim() : '' ;
                value = ( newParam[1] != undefined && newParam[1].trim() ) != '' ? newParam[1].trim() : '' ;
                var row = jQuery('.parameter-row:last').clone(true);
                row.find('label').attr('for', name).text(name);
                row.find('input').val(value).attr('id', name).attr('name', 'langs[' + name + ']');
                row.insertAfter('.parameter-row:last');
            }
            return false;
        });
    });
</script>
@stop

@section('content')
<div class="col-lg-3 col-xs-12">
    <div class="box box-primary">
        <div class="box-body table-responsive">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>{{ trans('laradmin::generic.select_file') }}</th>
                </tr>
                @foreach ($files as $package => $p)
                @foreach ($p as $file)
                <tr>
                    <td>
                        <a href="{{ route('translations_list', ["$package::$file[name]"]) }}">
                        {{$package}}::{{$file['name']}}
                        </a>
                    </td>
                </tr>
                @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@if (isset($selected_file['content']))
<div class="col-lg-9 col-xs-12">
    <div class="box box-primary">
        <div class="box-body table-responsive">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control new-parameter-name">
                        <span class="input-group-btn">
                            <button class="add-parameters" type="button" class="btn btn-info btn-flat">{{trans('laradmin::actions.add_parameters')}}</button>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box box-primary">
        <div class="box box-primary">
            <div class="box-body table-responsive">
                <form role="form" method="post" action="{{ route('translations_save', [Config::get('laradmin::langs.default_admin'), $selected_file['name']]) }}">
                    <input type="hidden" name="path" value="{{ $selected_file['path'] }}">
                    @foreach ($selected_file['content'] as $name => $value)
                    <div class="form-group parameter-row">
                        <div class="row">
                            <div class="col-lg-3 col-xs-12">
                                <label for="{{ $name }}">{{ $name }}</label>
                            </div>
                            <div class="col-lg-9 col-xs-12">
                                <div class="input-group">
                                    <input type="text" id="{{ $name }}" class="form-control" name="langs[{{ $name }}]" value="{{ $value }}">
                                    <span class="input-group-btn">
                                        <a href="{{ route('translations_delete',
                                        [base64_encode($selected_file['path']),
                                        $selected_file['name'],
                                        $name]) }}"
                                           class="btn btn-danger btn-flat" type="button">X</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="box-footer">
                        <button class="btn btn-success btn-block" type="submit"><i class="fa fa-check-square-o"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@stop