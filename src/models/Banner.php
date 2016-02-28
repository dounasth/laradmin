<?php

use Illuminate\Database\Eloquent\Model;

class Banner extends Model{

    protected $table = 'banners';
    protected $primaryKey = 'id';

    protected $fillable = ['title', 'image', 'url', 'text', 'status', 'type'];

    public $timestamps = false;

    public function scopeEnabled($query)
    {
        return $query->where('status', '=', 1);
    }

} 