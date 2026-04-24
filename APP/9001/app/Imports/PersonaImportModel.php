<?php


namespace App\Imports;

use App\Models\GTGTPersonas;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PersonaImportModel implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        return new GTGTPersonas([
           'nombres'     => $row[0],
           'apellidos'    => $row[1], 
           'departamento'    => $row[2], 
           'puesto'    => $row[3], 
           'telcel'    => $row[4], 
           'dpi'    => $row[5], 
           'direccion'    => $row[6], 
           'personaemergencia'    => $row[7], 
           'telcelemergencia'    => $row[8], 
           'jefeinmediato'    => $row[9], 
           'mailgt'    => $row[10], 
           'mailpe'    => $row[11], 
           'foto'    => $row[12], 
           'status'    => $row[13], 
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
