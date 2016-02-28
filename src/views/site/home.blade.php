@extends('laradmin::site.site-layout')

@section('page-title')
Γυναικεια Ανδρικά και Παιδικά Παπούτσια για όλες τις περιστάσεις - {{Config::get('laradmin::site.name')}}
@stop

@section('page-subtitle')
@stop

@section('styles')
@stop

@section('content')


<div class="container main-container headerOffset">

    @var $slides = Banner::whereType("home-slider")->whereStatus(1)->take(5)->get()
    @if (fn_is_not_empty($slides))
    <div class="row">
        <div class=" image-show-case-wrapper center-block relative col-lg-12">
            <div id="imageShowCase" class="owl-carousel owl-theme">
                @foreach ($slides as $slide)
                <div class="product-slide"> 
                    <div class="box-content-overly box-content-overly-white">
                        <div class="box-text-table">
                            <div class="box-text-cell ">
                                <div class="box-text-cell-inner ">
                                    {{ $slide->text }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ $slide->url }}"><img class="img-responsive" src="{{ route('banner.image', [$slide->id]) }}"></a>
                </div>
                @endforeach
            </div>
            <div style="clear:both;"></div>
            <a id="ps-next" class="ps-nav"><img src="{{ Config::get('laradmin::general.theme_path') }}/images/site/arrow-right.png" alt="N E X T"></a>
            <a id="ps-prev" class="ps-nav"><img src="{{ Config::get('laradmin::general.theme_path') }}/images/site/arrow-left.png" alt="P R E V"></a>
        </div>
    </div>
    <div style="clear:both"></div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <hr class="hr3">
        </div>
    </div>
    @var $sliderBanners = Banner::whereType("home-slider-below")->whereStatus(1)->take(6)->get()
    @if (fn_is_not_empty($sliderBanners))
    <div class="row featuredPostContainer ">
        <div class="featuredImageLook3">
            @foreach ($sliderBanners as $slide)
            <div class="col-md-4 col-sm-6 col-xs-6 col-xs-min-12">
                <div class="inner">
                    @if ($slide->url)
                    <a class="img-block" href="{{ $slide->url }}">
                    @endif
                    <div class="box-content-overly box-content-overly-white">
                        <div class="box-text-table">
                            <div class="box-text-cell ">
                                <div class="box-text-cell-inner dark">
                                    {{ $slide->text }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="img-title">{{ $slide->title }}</div>
                    <img class="img-responsive" src="{{ route('banner.image', [$slide->id]) }}">
                    @if ($slide->url)
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

</div>


<div class="container">

    <div class="row featuredPostContainer style2">
        <h3 class="section-title style2 text-center"><span>ΝΕΑ ΠΑΠΟΥΤΣΙΑ</span></h3>

        <div id="productslider" class="owl-carousel owl-theme">
            @foreach (Bonweb\Laracart\Product::recent()->take(12)->get() as $recentProduct)
                <div class="item">
                @include('laracart::site.product-mini', ['product'=>$recentProduct])
                </div>
            @endforeach
        </div>

    </div>

</div>

@var $parallax1 = Banner::whereType("parallax-image-1")->whereStatus(1)->first()
@if (fn_is_not_empty($parallax1))
<div class="parallax-section parallax-image" style="background: url('{{ route('banner.image', [$parallax1->id]) }}') fixed;">
    <div class="container">
        <div class="row ">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="parallax-content clearfix">
                    @if ($parallax1->url)
                    <a class="img-block" href="{{ $parallax1->url }}">
                    @endif
                    {{$parallax1->text}}
                    @if ($parallax1->url)
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="container ">

@if (false)
<div class="morePost row featuredPostContainer style2 globalPaddingTop ">
    <h3 class="section-title style2 text-center"><span>FEATURES PRODUCT</span></h3>
    <div class="container">
        <div class="row xsResponse">
        @foreach (Bonweb\Laracart\Product::recent()->take(12)->get() as $recentProduct)
        <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
            @include('laracart::site.product-mini', ['product'=>$recentProduct])
        </div>
        @endforeach
        </div>

        <div class="row">
            <div class="load-more-block text-center"><a class="btn btn-thin" href="#"> <i class="fa fa-plus-sign">+</i> load
                    more products</a></div>
        </div>
    </div>
</div>
@endif

@var $smallBanners = Banner::whereType("home-small")->whereStatus(1)->take(4)->get()
@if (fn_is_not_empty($smallBanners))
<hr class="no-margin-top">
<div class="width100 section-block ">
    <div class="row featureImg">
        @foreach ($smallBanners as $sb)
        <div class="col-md-3 col-sm-3 col-xs-6">
            @if ($sb->url)
            <a href="{{ $sb->url }}">
            @endif
            <img src="{{ route('banner.image', [$sb->id]) }}" class="img-responsive">
            @if ($sb->url)
            </a>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endif

<div class="width100 section-block">
    <h3 class="section-title"><span> BRAND</span> <a id="nextBrand" class="link pull-right carousel-nav"> <i
                class="fa fa-angle-right"></i></a> <a id="prevBrand" class="link pull-right carousel-nav"> <i
                class="fa fa-angle-left"></i> </a></h3>

    <div class="row">
        <div class="col-lg-12">
            <ul class="no-margin brand-carousel owl-carousel owl-theme">
                @foreach (\Bonweb\Laracart\Filter::allValues('brand') as $brand)
                <li><div style="background: #FFFFFF; text-align: center; font-size: 20px; width: 143px; height: 80px; display: table-cell; vertical-align: middle;">{{$brand}}</div></li>
                @endforeach
            </ul>
        </div>
    </div>

</div>

</div>

@var $parallax2 = Banner::whereType("parallax-image-2")->whereStatus(1)->first()
@if (fn_is_not_empty($parallax2))
<div class="parallax-section parallax-image" style="background: url(data:image/png;base64,{{$parallax2->image}}) fixed;">
    <div class="container">
        <div class="row ">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="parallax-content clearfix">
                    @if ($parallax2->url)
                    <a class="img-block" href="{{ $parallax2->url }}">
                    @endif
                    {{$parallax2->text}}
                    @if ($parallax2->url)
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="modal fade" id="productSetailsModalAjax" tabindex="-1" role="dialog"
     aria-labelledby="productSetailsModalAjaxLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>

    </div>

</div>


<div class="container marketing">
    @include('laracart::site.tag-cloud', ['count_from'=>100])
</div>
@stop