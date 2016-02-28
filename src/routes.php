<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before' => 'is.installed', 'after' => '', 'prefix' => 'install'), function() {
    Route::get('/', array('as' => 'install-main', 'uses' => 'LaradminInitController@main'));
    Route::post('/run', array('as' => 'install-run', 'uses' => 'LaradminInitController@runMigration'));
});

Route::group(array('before' => '', 'after' => 'cache'), function() {
    Route::get('/', array('as'=>'home', function()
    {
        return View::make('laradmin::site.home');
    }));
    Route::any('login', array('as' => 'login', 'uses' => 'LaradminUserController@login'));
    Route::any('register', array('as' => 'register', 'uses' => 'LaradminUserController@register'));
    Route::any('activate', array('as' => 'activate', 'uses' => 'LaradminUserController@activate'));
    Route::any('logout', array('as' => 'logout', 'uses' => 'LaradminUserController@logout'));

    Route::get('/contactus', array('as' => 'contact', 'uses' => 'LaradminContactController@contact'));
    Route::post('/contactus', array('as' => 'sendContact', 'uses' => 'LaradminContactController@sendContact'));

    Route::any('/user/activate', array('as' => 'activate_user', 'uses' => 'LaradminUserController@activate'));
    Route::any('/user/resend-activation/{id}', array('as' => 'resend_activation', 'uses' => 'LaradminUserController@resendActivation'));
    Route::any('/user/reset-password/{id}', array('as' => 'reset_password', 'uses' => 'LaradminUserController@resetPassword'));
    Route::any('/user/do-reset-password', array('as' => 'do_reset_password', 'uses' => 'LaradminUserController@doResetPassword'));

    Route::get('/'.Config::get('laradmin::slugs.pages').'/sitemap.html', array('as' => 'site.pages.sitemap', 'uses' => 'LaradminPagesController@sitemapPage'));
    Route::get('/'.Config::get('laradmin::slugs.pages').'/{page}.html', array('as' => 'site.pages.view', 'uses' => 'LaradminPagesController@viewPage'));

    Route::get('/sitemap-index.xml', array('as' => 'site.sitemap.index', 'uses' => 'LaradminSitemapsController@index'));
    Route::get('/sitemap-pages.xml', array('as' => 'site.sitemap.pages', 'uses' => 'LaradminSitemapsController@pages'));
});

Route::group(array('before' => 'auth|auth.admin|init.admin', 'after' => '', 'prefix' => 'admin'), function() {
    Route::get('/', array('as' => 'admin', 'uses' => 'LaradminDashboardController@dashboard'));

    Route::get('/search', array('as' => 'admin_search', 'uses' => 'LaradminDashboardController@search'));

    Route::get('users/list', array('as' => 'users', 'uses' => 'LaradminUserController@listUsers'));
    Route::any('users/manage/{id}', array('as' => 'edit_user', 'uses' => 'LaradminUserController@manageUser'));
    Route::any('users/manage/add', array('as' => 'add_user', 'uses' => 'LaradminUserController@manageUser'));
    Route::any('users/manage/delete/{id}', array('as' => 'delete_user', 'uses' => 'LaradminUserController@deleteUser'));

    Route::get('usergroups/list', array('as' => 'usergroups', 'uses' => 'LaradminUserController@listUsergroups'));
    Route::any('usergroups/manage/{id}', array('as' => 'edit_usergroup', 'uses' => 'LaradminUserController@manageUsergroup'));
    Route::any('usergroups/manage/add', array('as' => 'add_usergroup', 'uses' => 'LaradminUserController@manageUsergroup'));
    Route::any('usergroups/manage/delete/{id}', array('as' => 'delete_usergroup', 'uses' => 'LaradminUserController@deleteUsergroup'));

    Route::get('permissions/list', array('as' => 'permissions', 'uses' => 'LaradminUserController@managePermissions'));

    Route::get('tags/list', array('as' => 'tags', 'uses' => 'LaradminDashboardController@tags'));

    Route::get('settings/{config_file}', array('as' => 'settings', 'uses' => 'LaradminSettingsController@manageSettings'));
    Route::any('settings/save', array('as' => 'settings_save', 'uses' => 'LaradminSettingsController@saveSettings'));

    Route::get('languages/list', array('as' => 'languages_list', 'uses' => 'LaradminLanguagesController@listLangs'));
    Route::get('languages/status/{locale}/{status}', array('as' => 'language_set_status', 'uses' => 'LaradminLanguagesController@setStatus'))->where('status', '[0-1]');
    Route::get('languages/default/{locale}/{area}', array('as' => 'language_set_default', 'uses' => 'LaradminLanguagesController@setDefault'))->where('area', '(site|admin)');
    Route::get('languages/fallback/{locale}/{area}', array('as' => 'language_set_fallback', 'uses' => 'LaradminLanguagesController@setFallback'))->where('area', '(site|admin)');

    Route::get('languages/translations/list/{file?}', array('as' => 'translations_list', 'uses' => 'LaradminLanguagesController@listTranslations'));
    Route::any('languages/translations/save/{locale}/{file}', array('as' => 'translations_save', 'uses' => 'LaradminLanguagesController@saveTranslations'));
    Route::any('languages/translations/delete/{path}/{file}/{key}', array('as' => 'translations_delete', 'uses' => 'LaradminLanguagesController@deleteTranslation'));

    Route::any('pages/{id?}', array('as' => 'pages.manage', 'uses' => 'LaradminPagesController@pages'));
    Route::any('pages/delete/{id}', array('as' => 'pages.delete', 'uses' => 'LaradminPagesController@deletePage'));

    Route::get('banners', array('as' => 'banners', 'uses' => 'LaradminBannersController@listAll'));
    Route::get('banners/add', array('as' => 'banners.add', 'uses' => 'LaradminBannersController@add'));
    Route::get('banners/edit/{id}', array('as' => 'banners.edit', 'uses' => 'LaradminBannersController@edit'));
    Route::post('banners/save', array('as' => 'banners.save', 'uses' => 'LaradminBannersController@save'));
    Route::get('banners/delete/{id}', array('as' => 'banners.delete', 'uses' => 'LaradminBannersController@delete'));
});

Route::get('banner/{id}', array('as' => 'banner.image', 'uses' => 'LaradminBannersController@fetchImage'));

Route::any('json/tags', array('as' => 'json.tags', 'uses' => 'LaradminDashboardController@tagsJson'));

Route::get('cc', function(){
    Cache::flush();
    die('all cache deleted');
    exit;
});