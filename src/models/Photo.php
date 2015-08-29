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
        if (strrpos($this->path, 'http://', -strlen($this->path)) !== FALSE) {
            return $this->path;
        }
        else return \Config::get('app.url').'/public/'.$this->path;
    }

}