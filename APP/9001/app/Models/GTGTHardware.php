<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GTGTHardware extends Model
{
    protected $table = 'gtgthardware';
    
    protected $fillable = [
        'inventario','tipo','numeroserie', 'marca', 'modelo', 'seriecargador',
        'persona', 'status', 'idhistoria', 
        'fechadecompra', 'fechaasignacion', 'fechadesasignacion', 
        'hd', 'ram', 'cpu', 
        'led','tled', 'fled', 
        'tkey', 'fkey', 
        'tmouse', 'fmouse', 
        'thd', 'fhd', 
        'tram', 'fram', 
        'tcpu', 'fcpu', 
        'tboard', 'fboard', 
        'tlector', 'lector', 'flector', 
        'tcargador', 'fcargador', 
        'tred', 'fred', 'red', 
        'tsound', 'fsound', 
        'tvideo', 'fvideo', 
        'tprinter', 'fprinter', 
        'tbocinas', 'fbocinas', 
        'tcañonera', 'fcañonera', 
        'otro'
    ];
}
