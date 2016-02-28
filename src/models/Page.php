<?php

namespace Bonweb\Laradmin;

class Page extends \Eloquent {

    /**
     * Searchable rules.
     *
     * @var array
     */
    use Searchable;
    protected $searchable = [
        'columns' => [
            'slug' => 10,
            'title' => 10,
            'content' => 10,
        ],
    ];

	protected $table = 'pages';
//    protected $translatedAttributes = array('title', 'content');
    protected $fillable = array('title', 'slug', 'content', 'status');
    protected $guarded = array('id');

    public function scopeEnabled($query)
    {
        return $query->where('status', '=', 'A');
    }

}
