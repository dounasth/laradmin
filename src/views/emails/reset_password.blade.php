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
<div>reset password code: {{ $resetCode }}</div>

<div>link: {{ route('do_reset_password') }}?user={{$user->email}}&code={{ $resetCode }}</div>

</body>
</html>