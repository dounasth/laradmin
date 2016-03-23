<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ Config::get('app.url') }}/images/favicon144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ Config::get('app.url') }}/images/favicon114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ Config::get('app.url') }}/images/favicon72.png">
    <link rel="apple-touch-icon-precomposed" href="{{ Config::get('app.url') }}/images/favicon.png">
    <link rel="shortcut icon" href="{{ Config::get('app.url') }}/images/favicon.ico">
    @yield('meta')
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-75140619-1', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body style="display: none;">
<div class="fb-like"
    data-share="true"
    data-width="450"
    data-show-faces="true">
</div>
<div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only"> </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span></button>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-user colorWhite"> </i></button>
            <a class="navbar-brand " href="{{ Config::get('app.url') }}"> <img src="{{ Config::get('app.url') }}/images/logo.png" alt="{{Config::get('laradmin::site.name')}}"> </a>
            <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
                <div class="input-group">
                    <button class="btn btn-nobg getFullSearch" type="button"><i class="fa fa-search"> </i></button>
                </div>
            </div>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                @var $tree = Bonweb\Laracart\Category::defaultOrder()->enabled()->remember(3600*24)->get()->toTree();
                @include('laracart::site.menu-multilevel', ['tree'=>$tree])
                <li>
                    <a href="{{route('site.coupons.list')}}">
                        <span>Κουπονια</span>
                    </a>
                </li>
            </ul>

            <div class="nav navbar-nav navbar-right hidden-xs navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown megamenu-60width">
                    @if (Auth::user())
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"> </i> <span class="cartRespons"> {{ Auth::user()->first_name }} </span> <b class="caret"> </b>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="megamenu-content">
                                <ul class="col-lg-12  col-sm-12 col-md-6  unstyled">
                                    <li class="user-header bg-light-blue">
                                        @if (fn_is_not_empty(Auth::user()->profiles->first()))
                                            <img src="{{ Auth::user()->profiles->first()->photoURL }}" class="img-circle" alt="User Image" />
                                        @else
                                            <img src="{{ Config::get('laradmin::general.asset_path').'/img/avatar3.png' }}" class="img-circle" alt="User Image" />
                                        @endif
                                    </li>
                                    <li>{{Auth::user()->first_name}} {{ Auth::user()->last_name }}</li>
                                    <li>{{Auth::user()->email}}</li>
                                    <li><a href="{{ route('site.user.account')  }}"> Ο Λογαριασμός μου</a></li>
{{--                                    {{\Bonweb\Laradmin\Util::socialButtons()}}--}}
                                    <li><a href="{{ route('logout') }}" class="btn btn-danger"> Αποσύνδεση </a></li>
                                </ul>
                            </li>
                        </ul>
                    @else
                        <a href="{{route('login')}}" class="dropdown-toggle">
                            <i class="fa fa-user"> </i> Σύνδεση</b>
                        </a>
                    @endif
                    </li>
                </ul>

                <div class="search-box">
                    <div class="input-group">
                        <button class="btn btn-nobg getFullSearch" type="button"><i class="fa fa-search"> </i></button>
                    </div>

                </div>

            </div>

            <div class="nav navbar-nav navbar-right hidden-xs">
            </div>

        </div>

        <div class="search-full text-right"><a class="pull-right search-close"> <i class=" fa fa-times-circle"> </i> </a>
            <div class="searchInputBox pull-right">
                <form action="{{ route('search') }}" method="get">
                    <input type="search" name="q" placeholder="start typing and hit enter to search"
                           class="search-input">
                    <button class="btn-nobg search-btn" type="submit"><i class="fa fa-search"> </i></button>
                </form>
            </div>
        </div>

    </div>

</div>

@yield('content')

<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-12">
                    <h3> Επικοινωνία </h3>
                    <ul>
                        <li class="supportLi">
                            <p> Για οποιαδήποτε απορία ή βοήθεια, στείλτε μας ένα e-mail στην παρακάτω διεύθυνση και θα επικοινωνήσουμε μαζί σας το συντομότερο</p>
                            <br/>
                            <h4>
                                <a href="https://www.google.com/recaptcha/mailhide/d?k=01WNvkGDmcR7WJsrw-_QYB2g==&amp;c=HH2SRjRB9EL7Sew45y3IS6rlzMBNMryWuRzLfn4jS7I=" onclick="window.open('https://www.google.com/recaptcha/mailhide/d?k\07501WNvkGDmcR7WJsrw-_QYB2g\75\75\46c\75HH2SRjRB9EL7Sew45y3IS6rlzMBNMryWuRzLfn4jS7I\075', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;" title="Reveal this e-mail address">
                                    <i class="fa fa-envelope-o"> </i>....@luxurytales.gr</a>
                            </h4>
                        </li>
                    </ul>
                </div>
                <div style="clear:both" class="hide visible-xs"></div>
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3> Κατηγορίες </h3>
                    <ul>
                        @foreach (\Bonweb\Laracart\Category::defaultOrder()->basics()->remember(3600*24)->take(5)->get() as $bcat)
                        <li><a href="{{ route('site.cart.category.view', [$bcat->slug])}}">{{$bcat->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3> Πληροφορίες </h3>
                    <ul class="list-unstyled footer-nav">
                        @foreach (\Bonweb\Laradmin\Page::enabled()->remember(3600*24)->take(5)->get() as $page)
                        <li><a href="{{ route('site.pages.view', [$page->slug])}}">{{$page->title}}</a></li>
                        @endforeach
                        <li><a href="{{ route('site.pages.sitemap')}}">Sitemap</a></li>
                    </ul>
                </div>
                <div style="clear:both" class="hide visible-xs"></div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3> Ενημερώσεις </h3>
                    <ul>
                        <li>Εγγραφείτε στο newletter μας για να λαμβάνετε όλες τις ενημερώσεις μας!<br/><br/></li>
                        <li>
                            <!-- Begin MailChimp Signup Form -->
                            <div id="mc_embed_signup" class="input-append newsLatterBox text-center">
                                <form action="//prosfores-deals.us6.list-manage.com/subscribe/post?u=39bfd60ba931cb1bc4db1f824&amp;id=045035e860" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll">
                                        <div class="mc-field-group">
                                            <input type="email" value="" name="EMAIL" class="required email full text-center" placeholder="Email" id="mce-EMAIL">
                                        </div>
                                        <div id="mce-responses" class="clear">
                                            <div class="response" id="mce-error-response" style="display:none"></div>
                                            <div class="response" id="mce-success-response" style="display:none"></div>
                                        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_39bfd60ba931cb1bc4db1f824_37457b9487" tabindex="-1" value=""></div>
                                        <div class="clear"><button type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn  bg-gray">Εγγραφή</button></div>
                                    </div>
                                </form>
                            </div>
                            <!--End mc_embed_signup-->
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> {{ Config::get('laradmin::site.copyright') }} </p>
        </div>
    </div>

</footer>

<link href="{{ Config::get('laradmin::general.theme_path') }}/assets/bootstrap/css/bootstrap.css" rel="stylesheet">
<link id="pagestyle" rel="stylesheet" type="text/css" href="{{ Config::get('laradmin::general.theme_path') }}/assets/css/skin-{{Config::get('laradmin::site.skin')}}.css">
<link href="{{ Config::get('laradmin::general.theme_path') }}/assets/plugins/swiper-master/css/swiper.min.css" rel="stylesheet">
<link href="{{ Config::get('laradmin::general.theme_path') }}/assets/css/style.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<script>paceOptions = {elements: true};</script>
@yield('styles')
<script type='text/javascript' src="{{ Config::get('laradmin::general.theme_path') }}/assets/js/mc-validate.js"></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<script type="text/javascript" src="{{ Config::get('laradmin::general.theme_path') }}/assets/js/jquery/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="{{ Config::get('laradmin::general.theme_path') }}/assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ Config::get('laradmin::general.theme_path') }}/assets/plugins/swiper-master/js/swiper.jquery.min.js"></script>
<script type="text/javascript" charset="utf-8">
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        nextButton: '.nextControl',
        prevButton: '.prevControl',
        keyboardControl: true,
        paginationClickable: true,
        slidesPerView: 'auto',
        autoResize: true,
        resizeReInit: true,
        spaceBetween: 0,
        freeMode: true
    });
    jQuery('document').ready(function(){
        jQuery('body').css('display', 'inherit');
    });
</script>
<script type="text/javascript" src="{{ Config::get('laradmin::general.theme_path') }}/assets/js/pace.min.js"></script>
<script type="text/javascript" src="{{ Config::get('laradmin::general.theme_path') }}/assets/js/jquery.cycle2.min.js"></script>
<script type="text/javascript" src="{{ Config::get('laradmin::general.theme_path') }}/assets/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="{{ Config::get('laradmin::general.theme_path') }}/assets/js/helper-plugins/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="{{ Config::get('laradmin::general.theme_path') }}/assets/js/grids.js"></script>
<script type="text/javascript" src="{{ Config::get('laradmin::general.theme_path') }}/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{ Config::get('laradmin::general.theme_path') }}/assets/js/bootstrap.touchspin.js"></script>
<script type="text/javascript" src="{{ Config::get('laradmin::general.theme_path') }}/assets/js/script.js"></script>
@yield('scripts')
</body>
</html>