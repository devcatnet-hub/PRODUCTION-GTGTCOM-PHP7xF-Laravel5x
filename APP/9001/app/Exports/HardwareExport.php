<?php

namespace App\Exports;

use App\Models\GTGTHardware;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HardwareExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    protected $hardwares;

    public function __construct($hardwares = null)
    {
        $this->hardwares = $hardwares;
    }

    public function collection()
    {
        return $this->hardwares ?: GTGTHardware::all();
    }

    public function headings(): array
    {
        return [            
            'Numero de Inventario',
            'Tipo de Hardware',
            'Numero de Serie',
            'Marca',
            'Modelo',
            'Numero de Serie Cargador',
            'Estado Actual',
            'Asignado a:',
            'Fecha de Compra',
            'Se Asigno por Ultima Vez:',
            'Quedo libre por Ultima Vez:',
            'Capacidad y Tipo de HD',
            'Cantidad de Memoria',
            'Procesador',
            'Tamaño de Monitor',            
            'Tipo de Lector Optico',
            'Tipo de Red',
            'Otro:'
        ];
    }
}
