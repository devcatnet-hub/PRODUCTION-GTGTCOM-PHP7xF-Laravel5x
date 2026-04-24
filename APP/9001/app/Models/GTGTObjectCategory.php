<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GTGTObjectCategory extends Model
{
    protected $table = 'gtgtobjectcategory';
    
    protected $fillable = [
        'categoria','components'
    ];
}
