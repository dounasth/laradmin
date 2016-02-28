@extends('laradmin::site.site-layout')

@section('page-title')
{{ $page->title }}
@stop

@section('page-subtitle')
@stop

@section('styles')
<link href="{{ Config::get('laradmin::general.theme_path') }}/assets/css/blog.css" rel="stylesheet">
@stop

@section('scripts')
<script src="{{ Config::get('laradmin::general.theme_path') }}/assets/js/wow.min.js"></script>
<script>
    new WOW().init();
</script>
@stop

@section('content')


<div class="blog-wrapper parallaxOffset">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-centered blog-left">
                <div class="bl-inner">
                    <div class="item-blog-post">
                        <div class="post-header clearfix">
                            <h2 class="fadeInDown  wow" data-wow-duration="0.2s" data-wow-delay=".5s">{{ $page->title }}</h2>
                        </div>
                        <div class="post-main-view">
                            {{ '';// <div class="post-lead-image wow  fadeIn  " data-wow-duration="0.2s" data-wow-delay=".6s"><a href="blog-details.html"><img src="/images/blog/unnamed.jpg" class="img-responsive" alt="G"></a></div> }}
                            <div class="post-description wow  fadeIn  " data-wow-duration="0.2s" data-wow-delay=".1s">
                                {{ $page->content }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="gap"></div>


@stop