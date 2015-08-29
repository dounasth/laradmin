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

Route::pattern('id', '[0-9]+');

Route::get('/', array('as'=>'home', function()
{
    return View::make('laradmin::site.home');
}));

Route::group(array('before' => 'is.installed', 'after' => '', 'prefix' => 'install'), function() {
    Route::get('/', array('as' => 'install-main', 'uses' => 'LaradminInitController@main'));
    Route::post('/run', array('as' => 'install-run', 'uses' => 'LaradminInitController@runMigration'));
});

Route::any('login', array('as' => 'login', 'uses' => 'LaradminUserController@login'));
Route::any('register', array('as' => 'register', 'uses' => 'LaradminUserController@register'));
Route::any('activate', array('as' => 'activate', 'uses' => 'LaradminUserController@activate'));
Route::any('logout', array('as' => 'logout', 'uses' => 'LaradminUserController@logout'));

Route::any('/user/activate', array('as' => 'activate_user', 'uses' => 'LaradminUserController@activate'));
Route::any('/user/resend-activation/{id}', array('as' => 'resend_activation', 'uses' => 'LaradminUserController@resendActivation'));
Route::any('/user/reset-password/{id}', array('as' => 'reset_password', 'uses' => 'LaradminUserController@resetPassword'));
Route::any('/user/do-reset-password', array('as' => 'do_reset_password', 'uses' => 'LaradminUserController@doResetPassword'));

Route::group(array('before' => 'auth|auth.admin|init.admin', 'after' => '', 'prefix' => 'admin'), function() {
    Route::get('/', array('as' => 'admin', 'uses' => 'LaradminDashboardController@dashboard'));

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
});

Route::any('json/tags', array('as' => 'json.tags', 'uses' => 'LaradminDashboardController@tagsJson'));