<?php

namespace Bonweb\Laradmin;

class Seo extends \Eloquent {

    protected $table = 'seo';
    protected $fillable = ['title', 'description', 'keywords'];

    public function seoble()
    {
        return $this->morphTo();
    }

}