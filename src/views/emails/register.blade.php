<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Welcome to my site</h2>

<div>
    Your sign up details are below:
</div>
<div>login: {{ $user->email }}</div>
<div>name: {{ $user->last_name}} {{$user->first_name}} </div>
<div>activation code: {{ $user->getActivationCode() }}</div>

<a href="{{Config::get('app.url')}}/activate?email={{ $user->email }}&activationCode={{$user->getActivationCode()}} }">click here to activate</a>
</body>
</html>