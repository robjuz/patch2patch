<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    protected $fillable = ['text', 'created_by', 'patchwork_id'];

    public function patchwork()
    {
        return $this->belongsTo('App\Patchwork');
    }
}
