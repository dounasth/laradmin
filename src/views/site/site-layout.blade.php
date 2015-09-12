<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>LaraPort</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="{{ Config::get('laradmin::general.asset_path') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{ Config::get('laradmin::general.asset_path') }}/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{ Config::get('laradmin::general.asset_path') }}/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ Config::get('laradmin::general.asset_path') }}/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    @yield('styles')
    <link href="{{ Config::get('laradmin::general.asset_path') }}/css/site-custom.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-black">
{{AlertMessage::showMessages('laradmin::parts.messages')}}
<!-- header logo: style can be found in header.less -->
    <!-- Header Navbar: style can be found in header.less -->

<div class="navbar-wrapper">
    <div class="container">

        <div class="navbar navbar-inverse navbar-static-top">
            <div class="navbar-header">
                <a data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="icon-bar"></span><span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a href="/" class="navbar-brand">Bootstrap 3</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    @var $tree = Bonweb\Laracart\Category::all()->toTree();
                    @include('laracart::site.menu', ['tree'=>$tree])
                </ul>
            </div>
        </div>

        <div class="navbar-right">
            <ul class="nav navbar-nav">
                @if (Auth::user())
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>{{Auth::user()->email}}<i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="{{ Config::get('laradmin::general.asset_path').'/img/avatar3.png' }}" class="img-circle" alt="User Image" />
                            <p>
                                {{Auth::user()->name}} - {{Auth::user()->email}}
                                <small>Member since {{Auth::user()->created_at}}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        {{--
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>
                        --}}
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{route('edit_user', [Auth::user()->id])}}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>

    </div><!-- /container -->
</div>

@if (Route::getCurrentRoute()->getName() == 'home')
<div class="carousel slide" id="myCarousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li class="" data-slide-to="0" data-target="#myCarousel"></li>
        <li data-slide-to="1" data-target="#myCarousel" class="active"></li>
        <li data-slide-to="2" data-target="#myCarousel"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img class="img-responsive" style="width:100%" src="http://placehold.it/1500X500">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Bootstrap 3 Carousel Layout</h1>
                    <p></p>
                    <p><a href="http://getbootstrap.com" class="btn btn-lg btn-primary">Learn More</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="img-responsive" style="width:100%" src="http://placehold.it/1500X500">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Bootstrap 3 Carousel Layout</h1>
                    <p></p>
                    <p><a href="http://getbootstrap.com" class="btn btn-lg btn-primary">Learn More</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="img-responsive" style="width:100%" src="http://placehold.it/1500X500">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Bootstrap 3 Carousel Layout</h1>
                    <p></p>
                    <p><a href="http://getbootstrap.com" class="btn btn-lg btn-primary">Learn More</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Controls -->
    <a data-slide="prev" href="#myCarousel" class="left carousel-control">
        <span class="icon-prev"></span>
    </a>
    <a data-slide="next" href="#myCarousel" class="right carousel-control">
        <span class="icon-next"></span>
    </a>
</div>
@endif

<div class="wrapper row-offcanvas row-offcanvas-left" style="width: 1200px;margin: 0 auto;">
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side strech">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @if (trim($__env->yieldContent('page-menu')))
            <div class="dropdown pull-left">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                    <i class="fa fa-gear"></i>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    @yield('page-menu', '<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-ban"></i> Nothing to do here</a></li>')
                </ul>
            </div>
            @endif
            <h1>
                &nbsp;
                @yield('page-title')
                <small>@yield('page-subtitle')</small>
            </h1>
            <ol class="breadcrumb">
                @include('laradmin::parts.breadcrumb')
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="box box-solid">
                @yield('content')
            </div>
            @if (trim($__env->yieldContent('page-menu')))
            <ul class="nav nav-pills">
                @yield('page-menu')
            </ul>
            @endif
        </section><!-- /.content -->

        <!-- FOOTER -->
        <footer>
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>This Bootstrap layout is compliments of Bootply. · <a href="http://www.bootply.com/62603">Edit on Bootply.com</a></p>
        </footer>

    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ Config::get('laradmin::general.asset_path') }}/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ Config::get('laradmin::general.asset_path') }}/js/AdminLTE/app.js" type="text/javascript"></script>
@yield('scripts')
</body>
</html>