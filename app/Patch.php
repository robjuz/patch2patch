<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patch extends Model
{
    protected $table = 'patch';

    public function patchwork()
    {
        return $this->belongsTo('App\Patchwork');
    }

    public function fabric()
    {
        return $this->hasOne('App\Fabric');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
