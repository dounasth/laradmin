<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title>{{Config::get('laradmin::site.name')}} | Register</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="{{Config::get('laradmin::general.asset_path')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{Config::get('laradmin::general.asset_path')}}/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{Config::get('laradmin::general.asset_path')}}/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bg-black">

<div class="form-box" id="login-box">
    <div class="header" style="background-color: #00c0ef !important">Register</div>

    {{ Form::open(array('route' => 'register', 'method' => 'post', 'class'=>'form-signin')) }}










    <div class="body bg-gray">

        <div class="form-group">
            {{ Form::text('user[email]', '', array('placeholder'=>'E-mail', 'class'=>'form-control', 'required'=>'', 'autofocus'=>'')); }}
        </div>

        <div class="form-group">
            {{ Form::password('user[password]', array('placeholder'=>'Password', 'class'=>'form-control', 'required'=>'')); }}
        </div>

        <div class="form-group">
            {{ Form::text('user[first_name]', '', array('placeholder'=>'First name', 'class'=>'form-control', 'required'=>'', 'autofocus'=>'')); }}
        </div>

        <div class="form-group">
            {{ Form::text('user[last_name]', '', array('placeholder'=>'Last name', 'class'=>'form-control', 'required'=>'', 'autofocus'=>'')); }}
        </div>

        <div class="form-group">
            <label>{{ Form::checkbox('remember-me', true); }} Remember me</label>
        </div>

        <div class="form-group">
            <select class="form-control" name="usergroups[]" size="5" multiple="multiple">
                @foreach ($groups as $group)
                    <option value="{{ $group->name }}" {{ ($group->name=='User' ? 'selected' : '' )  }}>{{ $group->name }}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="footer">
        {{ Form::submit(trans('laradmin::generic.register'), array('class'=>'btn bg-info btn-block')) }}
    </div>
    {{ Form::token() }}
    {{ Form::close() }}

    @if ( class_exists( 'Atticmedia\Anvard\Anvard' ) )
        {{$socialButtons}}
    @endif

</div>


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>