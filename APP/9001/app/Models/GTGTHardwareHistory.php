<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GTGTHardwareHistory extends Model
{
    protected $table = 'gtgthardwarehistory';
    
    protected $fillable = [
        'hardware','persona','fechaevento', 'evento', 'notas'
    ];
}
