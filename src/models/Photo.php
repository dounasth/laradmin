<?php
/**
 * Created by PhpStorm.
 * User: nimda
 * Date: 5/22/15
 * Time: 11:49 AM
 */

namespace Bonweb\Laradmin;


class Photo extends \Eloquent {

    public function imageable()
    {
        return $this->morphTo();
    }

    public function httpPath() {
        if (strrpos($this->path, 'http://', -strlen($this->path)) !== FALSE || strrpos($this->path, 'https://', -strlen($this->path)) !== FALSE) {
            return $this->path;
        }
        else return \Config::get('app.url').'/public/'.$this->path;
    }

    public function photon($size) {
        $url = $this->httpPath();
        $url = str_ireplace(['http://', 'https://'], '', $url);
        return "http://i0.wp.com/$url?fit=$size,$size";
    }

}