<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GTGTPersonas extends Model
{
    protected $table = 'gtgtpersonas';
    
    protected $fillable = [
        'nombres','apellidos','departamento', 'puesto', 'telcel', 'dpi', 'direccion', 'personaemergencia', 'telcelemergencia', 'jefeinmediato', 'mailgt', 'mailpe', 'foto', 'status'
    ];

    public function scopeActive($query, $flag)
    {
        return $query->where('status', $flag);
    }
    
}
