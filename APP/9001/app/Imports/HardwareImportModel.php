<?php


namespace App\Imports;

use App\Models\GTGTHardware;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class HardwareImportModel implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        return new GTGTHardware([
           'inventario'     => $row[0],
           'tipo'    => $row[1], 
           'numeroserie'    => $row[2], 
           'hd'    => $row[3], 
           'ram'    => $row[4], 
           'cpu'    => $row[5], 
           'led'    => $row[6], 
           'tled'    => $row[7], 
           'fled'    => $row[8], 
           'tkey'    => $row[9], 
           'fkey'    => $row[10], 
           'tmouse'    => $row[11], 
           'fmouse'    => $row[12], 
           'thd'    => $row[13], 
           'fhd'    => $row[14], 
           'tram'    => $row[15], 
           'fram'    => $row[16], 
           'tcpu'    => $row[17], 
           'fcpu'    => $row[18], 
           'tboard'    => $row[19], 
           'fboard'    => $row[20], 
           'tlector'    => $row[21], 
           'lector'    => $row[22], 
           'flector'    => $row[23], 
           'tcargador'    => $row[24], 
           'fcargador'    => $row[25], 
           'tred'    => $row[26], 
           'fred'    => $row[27], 
           'red'    => $row[28], 
           'tsound'    => $row[29], 
           'fsound'    => $row[30], 
           'tvideo'    => $row[31], 
           'fvideo'    => $row[32], 
           'tprinter'    => $row[33], 
           'fprinter'    => $row[34], 
           'tbocinas'    => $row[35], 
           'fbocinas'    => $row[36], 
           'tcañonera'    => $row[37], 
           'fcañonera'    => $row[38], 
           'otro'    => $row[39], 
           'marca'    => $row[40], 
           'modelo'    => $row[41], 
           'seriecargador'    => $row[42], 
           'persona'    => $row[43], 
           'status'    => $row[44], 
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
