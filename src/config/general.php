<?php

return array(
    'path' => dirname(__FILE__).'/../',
    'asset_path' => Config::get('app.url').'/public/packages/bonweb/laradmin',
    'theme_path' => Config::get('app.url').'/public',
    'config_path' => dirname(__FILE__),

    'mail.from.address' => 'info@laraport.local',
    'mail.from.name' => 'Laraport',
);
