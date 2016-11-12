<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    public function patchwork()
    {
        return $this->belongsTo('App\Patchwork');
    }
}
