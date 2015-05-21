@extends('laradmin::layout')

@section('page-title')
Manage Languages
@stop

@section('page-subtitle')
@stop

@section('breadcrumb')
@parent
<li class="active">Manage Languages</li>
@stop

@section('page-menu')
@stop

@section('scripts')
<script type="text/javascript" charset="utf-8">
    jQuery(document).ready(function () {
        jQuery('.add-parameter').click(function (e) {
            e.preventDefault();
            var newParam = jQuery('.new-parameter-name').val();
            var row = jQuery('.parameter-row:last').clone(true);
            row.find('label').attr('for', newParam).text(newParam);
            row.find('input').val('').attr('id', newParam).attr('name', 'settings[' + newParam + ']');
            return false;
        });
    });
</script>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-body table-responsive">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th>{{ trans('laradmin::generic.language') }}</th>
                <th>{{ trans('laradmin::generic.locale') }}</th>
                <th>{{ trans('laradmin::generic.status') }}</th>
                <th>{{ trans('laradmin::generic.is_default_site') }}</th>
                <th>{{ trans('laradmin::generic.is_default_admin') }}</th>
                <th>{{ trans('laradmin::generic.is_fallback_site') }}</th>
                <th>{{ trans('laradmin::generic.is_fallback_admin') }}</th>
            </tr>
            @foreach ($languages as $locale => $language)
            <tr>
                <td>{{ $language['name'] }}</td>
                <td>{{ $locale }}</td>
                <td>
                    @if ($language['enabled'])
                    <a href="{{ route('language_set_status', [$locale, 0]) }}">
                        <span class="badge bg-green">{{ trans('laradmin::generic.enabled') }}</span>
                    </a>
                    @else
                    <a href="{{ route('language_set_status', [$locale, 1]) }}">
                        <span class="badge bg-red">{{ trans('laradmin::generic.disabled') }}</span>
                    </a>
                    @endif
                </td>
                <td>
                    @if ($locale == Config::get('laradmin::langs.default_site'))
                    <span class="badge bg-green">{{ trans('laradmin::generic.yes') }}</span>
                    @else
                    <a href="{{ route('language_set_default', [$locale, 'site']) }}">
                        <span class="badge bg-red">{{ trans('laradmin::generic.no') }}</span>
                    </a>
                    @endif
                </td>
                <td>
                    @if ($locale == Config::get('laradmin::langs.default_admin'))
                    <span class="badge bg-green">{{ trans('laradmin::generic.yes') }}</span>
                    @else
                    <a href="{{ route('language_set_default', [$locale, 'admin']) }}">
                        <span class="badge bg-red">{{ trans('laradmin::generic.no') }}</span>
                    </a>
                    @endif
                </td>
                <td>
                    @if ($locale == Config::get('laradmin::langs.fallback_site'))
                    <span class="badge bg-green">{{ trans('laradmin::generic.yes') }}</span>
                    @else
                    <a href="{{ route('language_set_fallback', [$locale, 'site']) }}">
                        <span class="badge bg-red">{{ trans('laradmin::generic.no') }}</span>
                    </a>
                    @endif
                </td>
                <td>
                    @if ($locale == Config::get('laradmin::langs.fallback_admin'))
                    <span class="badge bg-green">{{ trans('laradmin::generic.yes') }}</span>
                    @else
                    <a href="{{ route('language_set_fallback', [$locale, 'admin']) }}">
                        <span class="badge bg-red">{{ trans('laradmin::generic.no') }}</span>
                    </a>
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop