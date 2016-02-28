<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset your password</title>
    <link href="{{Config::get('laradmin::general.asset_path')}}/css/login.css" rel="stylesheet" id="bootstrap-css">
    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:700);

        body {
            margin:0;
            font-family:'Lato', sans-serif;
            text-align:center;
            color: #999;
        }

        .form-signin
        {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading, .form-signin .checkbox
        {
            margin-bottom: 10px;
        }
        .form-signin .checkbox
        {
            font-weight: normal;
        }
        .form-signin .form-control
        {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .form-signin .form-control:focus
        {
            z-index: 2;
        }
        .form-signin input[type="text"]
        {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .form-signin input[type="password"]
        {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .account-wall
        {
            margin-top: 20px;
            padding: 40px 0px 20px 0px;
            background-color: #f7f7f7;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .login-title
        {
            color: #555;
            font-size: 18px;
            font-weight: 400;
            display: block;
        }
        .profile-img
        {
            width: 96px;
            height: 96px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
        .need-help
        {
            margin-top: 10px;
        }
        .new-account
        {
            display: block;
            margin-top: 10px;
        }

    </style>
</head>
<body>
{{AlertMessage::showMessages('laradmin::parts.messages-login')}}
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Activate in to continue</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                     alt="">
                {{ Form::open(array('route' => 'do_reset_password', 'method' => 'post', 'class'=>'form-reset-pass')) }}

                {{ Form::text('user', Input::get('user', ''), array('placeholder'=>'Email', 'class'=>'form-control', 'required'=>'', 'autofocus'=>'')); }}

                {{ Form::text('code', Input::get('code', ''), array('placeholder'=>'Reset Code', 'class'=>'form-control', 'required'=>'')); }}

                {{ Form::text('newPassword', '', array('placeholder'=>'New Password', 'class'=>'form-control', 'required'=>'')); }}
                {{ Form::text('newPassword_confirm', '', array('placeholder'=>'Confirm Password', 'class'=>'form-control', 'required'=>'')); }}

                {{ Form::submit('Activate', array('class'=>'btn btn-lg btn-primary btn-block')) }}

                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                {{ Form::token() }}
                {{ Form::close() }}
            </div>
            <a href="{{ route('register') }}" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>
</body>
</html>


