<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patchwork extends Model
{
    protected $table = 'patchwork';
    protected $fillable = ['content','title','description'];

    public function patches()
    {
        return $this->hasMany('App\Patch');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
