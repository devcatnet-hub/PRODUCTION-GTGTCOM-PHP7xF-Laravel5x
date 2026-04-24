<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'group','title','link', 'parent', 'order', 'enabled',
    ];
}


