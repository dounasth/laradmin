<?php namespace Bonweb\Laradmin;

/**
 * Created by PhpStorm.
 * User: nimda
 * Date: 4/17/15
 * Time: 5:02 PM
 */

class UtilLang {

    public static function getLangs() {
        return \Config::get('laradmin::langs.list');
    }

    public static function getLangsKeys() {
        return array_keys(UtilLang::getLangs());
    }

    public static function getLangConfigPath() {
        $path = \Config::get('laradmin::general.config_path').'/langs.php';
        return $path;
    }

    public static function getLangConfig() {
        $langConfig = require(UtilLang::getLangConfigPath());
        return $langConfig;
    }

    public static function saveLangConfig($array) {
        Util::saveArrayToFile($array, UtilLang::getLangConfigPath());
    }

}