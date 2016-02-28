<?php namespace Bonweb\Laradmin;

/**
 * Created by PhpStorm.
 * User: nimda
 * Date: 4/17/15
 * Time: 5:02 PM
 */

class Util {

    public static function saveArrayToFile($array, $file) {
        $content = '<?php return '.var_export($array, true).'; ?>';
//        if (file_exists($file)) {
            file_put_contents($file, $content);
//        }
    }

    public static function pingEngines() {
        if (\Config::get("laradmin::site.is-open")) {
            $title = \Config::get("laradmin::misc.pingo.title");
            $url = \Config::get("laradmin::misc.pingo.blogurl");
            $rss = \Config::get("laradmin::misc.pingo.rssurl");
            $pinger = new \Bonweb\Laradmin\Pinger();
            $pinger->pingAll($title, $url, $rss);
            return true;
        }
        else return false;
    }

}