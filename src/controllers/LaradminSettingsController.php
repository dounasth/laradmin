<?php

class LaradminSettingsController extends \LaradminBaseController {

    public function manageSettings($config_file) {
        $settings = Config::get($config_file);
        return View::make('laradmin::settings.manage')->withSettings($settings)->withConfigfile($config_file);
    }

    public function saveSettings() {
        $file = Input::get('configfile');
        list($package, $file) = explode('::', $file);
        $settings = Input::get('settings');

        $content = '<?php return '.var_export($settings, true).'; ?>';

        $config_file = Config::get($package.'::general.config_path').'/'.$file.'.php';

        if (file_exists($config_file)) {
            file_put_contents($config_file, $content);
        }
        return Redirect::route('settings', [Input::get('configfile')]);
    }

}
