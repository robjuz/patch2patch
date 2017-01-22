<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patchwork extends Model
{
    protected $table = 'patchwork';
    protected $fillable = ['content','title','description'];

    public function fabrics()
    {
        return $this->belongsToMany('App\Fabric', 'patchwork_fabric');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function getSlugAttribute()
    {
        if (!empty($this->attributes['title'])) {
            return '-'.str_slug($this->attributes['title']);
        } else {
            return '';
        }
    }
}
