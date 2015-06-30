<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25/9/2014
 * Time: 5:12 μμ
 */

class Profile extends Eloquent  {

    protected $fillable = array('provider', 'user_id');

    public function user() {
        return $this->belongsTo('User');
    }
}