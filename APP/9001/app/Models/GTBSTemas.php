<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GTBSTemas extends Model
{
    protected $table = 'gtbstemas';
    
    protected $fillable = [
        'fecha','tema','responsable', 'participantes', 'lugar', 'hora', 'costo', 'nota'
    ];
}
