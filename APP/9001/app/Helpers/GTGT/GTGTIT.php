<?php

namespace App\Helpers\GTGT;

use App\Bitacora;
use Illuminate\Support\Facades\DB;

use App\Models\GTGTPersonas;

class GTGTIT
{
   public static function Persona($status, $persona)
    {
        if ($status != '2'){

            if ($persona != '0'){

                $persona = GTGTPersonas::where([
                    ['id', $persona]
                    ])
                    ->first(); 
    
                $persona = 'Asignado a '.$persona->nombres.' '.$persona->apellidos;
    
            }elseif ($persona == '0'){
    
                $persona = 'Hardware No Asignado';
    
            }

        } elseif ($status == '2'){

            $persona = 'Hardware dado de Baja';

        }

        return $persona;
    }
}
