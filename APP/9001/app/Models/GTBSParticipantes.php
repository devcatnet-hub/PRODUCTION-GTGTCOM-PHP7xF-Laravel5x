<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GTBSParticipantes extends Model
{
    protected $table = 'gtbsparticipantes';
    
    protected $fillable = [
        'nombre','cargo','empresa', 'nit', 'dirfactura', 'dirfacturaenvio', 'telefono', 'email', 'observaciones', 'tema', 'confirmado', 'pagado'
    ];
}
