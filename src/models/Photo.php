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

}