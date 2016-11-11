<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patchwork extends Model
{
    protected $table = 'patchworks';
    protected $fillable = ['content'];
}
