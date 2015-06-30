<?php

class Settings extends Eloquent {

	protected $table = 'settings';

    public function scopeOfName($query, $name)
    {
        return $query->whereName($name)->firstOrFail();
    }

    public static function byName($name) {
        return self::ofName($name)->value;
    }

}
