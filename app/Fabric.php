<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    protected $table = 'fabric';

    public function patches()
    {
        return $this->hasMany('App\Patch');
    }
}
