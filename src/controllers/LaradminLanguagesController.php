<?php

use Bonweb\Laradmin\UtilLang;

class LaradminLanguagesController extends \LaradminBaseController
{

    public function listLangs() {
        $langs = Config::get('laradmin::langs.list');
        return View::make('laradmin::languages.list')->withLanguages($langs);
    }

    public function listTranslations($selected='') {
        $folders = Event::fire('admin.translations');
        $locale = Config::get('laradmin::langs.default_admin');

        $selected_file = '';
        if ($selected) {
            $selected = explode('::', $selected);
        }

        $files = array();

        foreach ($folders as $folder) {
            foreach(File::allFiles($folder['path']."/lang/{$locale}") as $file) {
                $files[$folder['prefix']][] = array(
                    'name' => basename($file->getFileName(), '.php'),
                    'file' => $file->getFileName(),
                    'path' => $folder['path'],
                );

                if (
                    is_array($selected) &&
                    $selected[0] == $folder['prefix'] &&
                    $selected[1] == basename($file->getFileName(), '.php')
                ) {
                    $selected_file = array(
                        'name' => implode('::', $selected),
                        'content' => require($file->getPathName()),
                        'path' => $folder['path'],
                    );
                }
            }
        }

        return View::make('laradmin::languages.translations.list')->withFiles($files)->with('selected_file', $selected_file);
    }

    public function saveTranslations($locale, $file) {
        $langs = Input::get('langs', array());
        $path = Input::get('path', '');
        $file = explode('::', $file);
        $file = end($file);

        $filepath = $path.'/lang/'.$locale.'/'.$file.'.php';
        if (fn_is_not_empty($langs) && file_exists($filepath)) {
            $content = '<?php return '.var_export($langs, true).'; ?>';
            file_put_contents($filepath, $content);
        }

        foreach( UtilLang::getLangsKeys() as $lang ) {
            if ($lang != $locale) {
                $filepath = $path.'/lang/'.$lang.'/'.$file.'.php';
                $other_locale = require($filepath);
                $diff = array_diff(array_keys($langs), array_keys(require($filepath)));
                foreach( $diff as $dif ) {
                    $other_locale[$dif] = $langs[$dif];
                }
                if (fn_is_not_empty($other_locale) && file_exists($filepath)) {
                    $content = '<?php return '.var_export($other_locale, true).'; ?>';
                    file_put_contents($filepath, $content);
                }
            }
        }
        return Redirect::back();
    }

    public function deleteTranslation($path, $file, $key) {
        $path = base64_decode($path);
        $file = explode('::', $file);
        $file = end($file);

        niceprintr($path);
        niceprintr($file);
        niceprintr($key);

        foreach( UtilLang::getLangsKeys() as $lang ) {
            $filepath = $path.'/lang/'.$lang.'/'.$file.'.php';
            $langs = require($filepath);
            unset($langs[$key]);
            if (fn_is_not_empty($langs) && file_exists($filepath)) {
                $content = '<?php return '.var_export($langs, true).'; ?>';
                file_put_contents($filepath, $content);
            }
        }
        sleep(5);
        return Redirect::back();
    }

    public function setStatus($locale, $status){
        $langs = UtilLang::getLangConfig();
        $langs['list'][$locale]['enabled'] = $status;
        UtilLang::saveLangConfig($langs);
        sleep(5);
        return Redirect::back();
    }

    public function setDefault($locale, $area){
        $langs = UtilLang::getLangConfig();
        $langs['default_'.$area] = $locale;
        UtilLang::saveLangConfig($langs);
        sleep(5);
        return Redirect::back();
    }

    public function setFallback($locale, $area){
        $langs = UtilLang::getLangConfig();
        $langs['fallback_'.$area] = $locale;
        UtilLang::saveLangConfig($langs);
        sleep(5);
        return Redirect::back();
    }

}
