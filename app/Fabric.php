<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    protected $table = 'fabric';
    protected $fillable = ['title', 'image', 'color'];

    public function patches()
    {
        return $this->hasMany('App\Patch');
    }

    public function patchworks()
    {
        return $this->belongsToMany('App\Patchwork', 'patchwork_fabric');
    }
}
