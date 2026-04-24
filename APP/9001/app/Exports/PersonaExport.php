<?php

namespace App\Exports;

use App\Models\GTGTPersonas;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PersonaExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    protected $personas;

    public function __construct($personas = null)
    {
        $this->personas = $personas;
    }

    public function collection()
    {
        return $this->personas ?: GTGTPersonas::all();
    }

    public function headings(): array
    {
        return [
            'DBID',
            'DB Creation Date',
            'DB Last Update Date',
            'Nombres',
            'Apellidos',
            'Departamento',
            'Puesto',
            'Telefono',
            'DPI',
            'Direccion',
            'En Caso de Emergencia Comunicarse con',
            'Telefonos Emergengia',
            'Jefe Inmediato',
            'Usuario/Correo',
            'Correo Personal',
            'Nombre Archivo Fotografia',
            'Status',
        ];
    }
}
