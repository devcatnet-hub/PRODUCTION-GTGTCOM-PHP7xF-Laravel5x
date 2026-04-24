<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GTGTObject extends Model
{
    protected $table = 'gtgtobjects';
    
    protected $fillable = [
        'categoria','persona','icono','nombre','notas','documento','foto','dato','valor','porcentaje'
    ];
}
