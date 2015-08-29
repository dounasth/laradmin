<?php

/*
  |--------------------------------------------------------------------------
  | Application & Route Filters
  |--------------------------------------------------------------------------
  |
  | Below you will find the "before" and "after" events for the application
  | which may be used to do any work before or after a request into your
  | application. Here you may also register your custom route filters.
  |
 */

Blade::extend(function($value) {
    return preg_replace('/\@var(.+)/', '<?php ${1}; ?>', $value);
});

App::before(function($request) {
    if (Request::get('open') == 'y') {
        Session::put('open', 'y');
    }
    if ( Session::get('open', 'n') != 'y' ) {
        exit;
    }
//    Config::set('app.url', 'http://'.Config::get('laradmin::general.domain'));
});


App::after(function($request, $response) {
    //
});

/*
  |--------------------------------------------------------------------------
  | Authentication Filters
  |--------------------------------------------------------------------------
  |
  | The following filters are used to verify that the user of the current
  | session is logged into this application. The "basic" filter easily
  | integrates HTTP Basic authentication for quick, simple checking.
  |
 */

App::before(function($request)
{
    App::setLocale(Config::get('laradmin::langs.default_site'));
});

App::after(function($request, $response)
{
    //
});

Route::filter('auth', function() {
    if (Auth::guest()) {
        if (Request::ajax()) {
            return Response::make('Unauthorized', 401);
        } else {
            return Redirect::guest('login');
        }
    }
});
Route::filter('auth.admin', function() {
    $user = Sentry::getUser();
    if (!$user) {
        $user = Auth::getUser();
        $user = Sentry::findUserById($user->id);
    }
    $group = Sentry::findGroupByName('Administrator');
    if (!$user || !$user->inGroup($group)) {
        return Redirect::guest('login');
    }
});
Route::filter('init.admin', function() {
    App::setLocale(Config::get('laradmin::langs.default_admin'));
});

Route::filter('auth.basic', function() {
    return Auth::basic();
});

/*
  |--------------------------------------------------------------------------
  | Guest Filter
  |--------------------------------------------------------------------------
  |
  | The "guest" filter is the counterpart of the authentication filters as
  | it simply checks that the current user is not logged in. A redirect
  | response will be issued if they are, which you may freely change.
  |
 */

Route::filter('guest', function() {
    if (Auth::check())
        return Redirect::to('/');
});

/*
  |--------------------------------------------------------------------------
  | CSRF Protection Filter
  |--------------------------------------------------------------------------
  |
  | The CSRF filter is responsible for protecting your application against
  | cross-site request forgery attacks. If this special token in a user
  | session does not match the one given in this request, we'll bail.
  |
 */

Route::filter('csrf', function() {
    if (Session::token() != Input::get('_token')) {
        throw new Illuminate\Session\TokenMismatchException;
    }
});

Route::filter('is.installed', function() {
    if (Schema::hasTable('users')) {
        return Redirect::to('/');
    }
});