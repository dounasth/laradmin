@extends('laradmin::site.site-layout')

@section('page-title')
Sitemap
@stop

@section('page-subtitle')
@stop

@section('styles')
<style type="text/css">
    .sitemap ul, .sitemap ul li {
        display: block;
    }
    .sitemap .dropdown-menu {
        position: inherit;
        display: block;
        top: auto;
        left: auto;
        float: none;
        clear: both;
        background: transparent;
        border: none;
        box-shadow: none;
    }
</style>
@stop

@section('scripts')
@stop

@section('content')


<div class="blog-wrapper parallaxOffset">
    <div class="container">
        <div class="row">
            <div class="col-md-12 sitemap">
                <div class="row">
                <ul>
                    @var $tree = Bonweb\Laracart\Category::defaultOrder()->get()->toTree();
                    @foreach ($tree as $category)
                    <li class="{{ $category->children->count() > 0 ? isset($class) ? $class : 'dropdown' : '' }}">
                        <div class="col-md-3">
                            <a data-toggle="{{ ($category->getDescendantCount() == 0) ? '' : 'dropdown' }}" class="{{ $category->children->count() > 0 ? 'dropdown-toggle' : '' }}"
                               href="{{ ($category->getDescendantCount() == 0) ? route('site.cart.category.view', [$category->slug]) : '#' }}">
                                <span>{{ $category->title }}</span>
                            </a>
                            @if ( $category->children->count() > 0 )
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                @include('laracart::site.menu', ['tree'=>$category->children, 'class'=>'dropdown-submenu'])
                            </ul>
                            @endif
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="gap"></div>
                <div class="row">
                <ul class="col-md-3">
                    @foreach (\Bonweb\Laradmin\Page::enabled()->take(5)->get() as $page)
                    <li><a href="{{ route('site.pages.view', [$page->slug])}}">{{$page->title}}</a></li>
                    @endforeach
                    <li><a href="{{route('site.coupons.list')}}">Κουπονια</a></li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="gap"></div>


@stop