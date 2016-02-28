<?php

/*Event::listen('admin.top-left-menu', function(){
    if ( Route::getCurrentRoute()->getPrefix() == 'admin' ) {
    return array();
    }
    else return [];
}, 1000000);*/

Event::listen('admin.left-menu', function(){
    if ( Route::getCurrentRoute()->getPrefix() == 'admin' ) {
    return array(
        'dashboard' => array(
            'label' => 'Dashboard',
            'href' => route('admin'),
            'icon' => 'fa-dashboard',
        ),
    );
    }
    else return [];
}, 1000000);
Event::listen('admin.left-menu', function(){
    if ( Route::getCurrentRoute()->getPrefix() == 'admin' ) {

//    $dbsubmenu = array();
//    foreach (Config::get('database.connections') as $name => $db) {
//        if ($db['driver'] == 'sqlite') {
//            $href = "/adminer.php?sqlite=&username=&db={$db['database']}";
//        }
//        elseif ($db['driver'] == 'mysql') {
//            $href = "/adminer.php?server={$db['host']}&username={$db['username']}&db={$db['database']}&password={$db['password']}";
//        }
//        $dbsubmenu['db-'.$name] = array(
//            'label' => $name,
//            'href' => Config::get('app.url') . $href,
//            'icon' => 'fa-list',
//        );
//    }

    return array(
        'pages' => array(
            'label' => 'Pages',
            'href' => '#',
            'icon' => 'fa-cogs',
            'submenu' => array(
                'general' => array(
                    'label' => 'List',
                    'href' => route('pages.manage'),
                    'icon' => 'fa-cogs',
                ),
                'misc' => array(
                    'label' => 'Add',
                    'href' => route('pages.manage', array('id'=>0)),
                    'icon' => 'fa-cogs',
                ),
            ),
        ),
        'banners' => array(
            'label' => 'Banners',
            'href' => '#',
            'icon' => 'fa-cogs',
            'submenu' => array(
                'general' => array(
                    'label' => 'List',
                    'href' => route('banners'),
                    'icon' => 'fa-cogs',
                ),
                'misc' => array(
                    'label' => 'Add',
                    'href' => route('banners'),
                    'icon' => 'fa-cogs',
                ),
            ),
        ),
        'settings' => array(
            'label' => 'Settings',
            'href' => '#',
            'icon' => 'fa-cogs',
            'submenu' => array(
                'general' => array(
                    'label' => 'General',
                    'href' => route('settings', array('laradmin::general')),
                    'icon' => 'fa-user',
                ),
                'site' => array(
                    'label' => 'Site',
                    'href' => route('settings', array('laradmin::site')),
                    'icon' => 'fa-user',
                ),
                'misc' => array(
                    'label' => 'Misc',
                    'href' => route('settings', array('laradmin::misc')),
                    'icon' => 'fa-user',
                ),
                'permissions' => array(
                    'label' => 'Permissions',
                    'href' => route('settings', array('laradmin::permissions')),
                    'icon' => 'fa-user',
                ),
            ),
        ),
        'languages' => array(
            'label' => 'Languages',
            'href' => '#',
            'icon' => 'fa-cogs',
            'submenu' => array(
                'manage' => array(
                    'label' => 'Manage',
                    'href' => route('languages_list'),
                    'icon' => 'fa-cogs',
                ),
                'translate' => array(
                    'label' => 'Translate',
                    'href' => route('translations_list'),
                    'icon' => 'fa-cogs',
                ),
            ),
        ),
        'users' => array(
            'label' => 'Manage Users',
            'href' => '#',
            'icon' => 'fa-users',
            'submenu' => array(
                'users' => array(
                    'label' => 'Users',
                    'href' => route('users'),
                    'icon' => 'fa-user',
                ),
                'usergroups' => array(
                    'label' => 'User Groups',
                    'href' => route('usergroups'),
                    'icon' => 'fa-users',
                ),
                'permissions' => array(
                    'label' => 'Permissions',
                    'href' => route('permissions'),
                    'icon' => 'fa-check-square-o',
                ),
            ),
        ),
        'tags' => array(
            'label' => 'Tags',
            'href' => route('tags'),
            'icon' => 'fa-list',
        ),
//        'databases' => array(
//            'label' => 'Databases',
//            'href' => '#',
//            'icon' => 'fa-list',
//            'submenu' => $dbsubmenu
//        ),
    );
    }
    else return [];
}, 100);

Event::listen('admin.dashboard.widgets', function(){
    if ( Route::getCurrentRoute()->getPrefix() == 'admin' ) {
    $widget = new ViewWidget('welcome', Widget::TYPE_VIEW);
    $widget->view = 'laradmin::widgets.dash-welcome';
    $widget->wrapClass = 'col-lg-3 col-xs-6';
    $widget->data = array(
        'user' => Auth::user()
    );
    return $widget;
    }
    else return [];
}, 1000000);

Event::listen('admin.dashboard.widgets', function(){
    if ( Route::getCurrentRoute()->getPrefix() == 'admin' ) {
    $widget = new ViewWidget('users-count', Widget::TYPE_VIEW);
    $widget->view = 'laradmin::widgets.dash-users-count';
    $widget->wrapClass = 'col-lg-3 col-xs-6';
    $widget->data = array(
        'users_count' => User::count()
    );
    return $widget;
    }
    else return [];
}, 1000000);

Event::listen('admin.dashboard.widgets', function(){
    if ( Route::getCurrentRoute()->getPrefix() == 'admin' ) {
    $widget = new ViewWidget('analytics-bounce-rate', Widget::TYPE_VIEW);
    $widget->view = 'laradmin::widgets.dash-analytics-bounce-rate';
    $widget->wrapClass = 'col-lg-3 col-xs-6';
    $widget->data = array();
    return $widget;
    }
    else return [];
}, 1000000);

Event::listen('admin.dashboard.widgets', function() {
    if ( Route::getCurrentRoute()->getPrefix() == 'admin' ) {
    $widget = new ViewWidget('analytics-visitors', Widget::TYPE_VIEW);
    $widget->view = 'laradmin::widgets.dash-analytics-visitors';
    $widget->wrapClass = 'col-lg-3 col-xs-6';
    $widget->data = array();
    return $widget;
    }
    else return [];
}, 1000000);

/*Event::listen('admin.dashboard.widgets', function(){
    return array(
        'server-load' => array(
            'view' => 'laradmin::widgets.dash-server-load',
            'wrap_class' => 'col-lg-6 connectedSortable',
            'data' => array(
            ),
        )
    );
}, 1000000);

Event::listen('admin.dashboard.widgets', function(){
    return array(
        'analytics-map' => array(
            'view' => 'laradmin::widgets.dash-analytics-map',
            'wrap_class' => 'col-lg-6 connectedSortable',
            'data' => array(
            ),
        )
    );
}, 1000000);*/

Event::listen('admin.translations', function() {
    if ( Route::getCurrentRoute()->getPrefix() == 'admin' ) {
    return array(
        'prefix' => 'laradmin',
        'path' => dirname(__FILE__),
    );
    }
    else return [];
}, 1000000);

