<?php

Event::listen('admin.top-left-menu', function(){
    return array(
        'settings' => array(
            'label' => '',
            'href' => '#',
            'icon' => 'fa-cogs',
            'submenu' => array(
                'example1' => array(
                    'label' => 'example1',
                    'href' => '#',
                    'icon' => 'fa-user',
                    'submenu' => array(
                        'example1' => array(
                            'label' => 'example1',
                            'href' => '#',
                            'icon' => 'fa-user',
                        ),
                        'divider1' => 'divider',
                        'example2' => array(
                            'label' => 'example2',
                            'href' => '#',
                            'icon' => 'fa-user',
                        ),
                    ),
                ),
                'divider1' => 'divider',
                'example2' => array(
                    'label' => 'example2',
                    'href' => '#',
                    'icon' => 'fa-user',
                ),
            ),
        ),
    );
}, 1000000);

Event::listen('admin.left-menu', function(){
    return array(
        'dashboard' => array(
            'label' => 'Dashboard',
            'href' => route('admin'),
            'icon' => 'fa-dashboard',
        ),
    );
}, 1000000);
Event::listen('admin.left-menu', function(){
    return array(
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
    );
}, 100);

Event::listen('admin.dashboard.widgets', function(){
    $widget = new ViewWidget('welcome', Widget::TYPE_VIEW);
    $widget->view = 'laradmin::widgets.dash-welcome';
    $widget->wrapClass = 'col-lg-3 col-xs-6';
    $widget->data = array(
        'user' => Auth::user()
    );
    return $widget;
}, 1000000);

Event::listen('admin.dashboard.widgets', function(){
    $widget = new ViewWidget('users-count', Widget::TYPE_VIEW);
    $widget->view = 'laradmin::widgets.dash-users-count';
    $widget->wrapClass = 'col-lg-3 col-xs-6';
    $widget->data = array(
        'users_count' => User::count()
    );
    return $widget;
}, 1000000);

Event::listen('admin.dashboard.widgets', function(){
    $widget = new ViewWidget('analytics-bounce-rate', Widget::TYPE_VIEW);
    $widget->view = 'laradmin::widgets.dash-analytics-bounce-rate';
    $widget->wrapClass = 'col-lg-3 col-xs-6';
    $widget->data = array();
    return $widget;
}, 1000000);

Event::listen('admin.dashboard.widgets', function() {
    $widget = new ViewWidget('analytics-visitors', Widget::TYPE_VIEW);
    $widget->view = 'laradmin::widgets.dash-analytics-visitors';
    $widget->wrapClass = 'col-lg-3 col-xs-6';
    $widget->data = array();
    return $widget;
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
    return array(
        'prefix' => 'laradmin',
        'path' => dirname(__FILE__),
    );
}, 1000000);

