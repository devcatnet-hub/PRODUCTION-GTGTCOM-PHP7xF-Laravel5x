<?php

use App\Models\GTBSTemas;
use Illuminate\Database\Seeder;

class GTBSTemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GTBSTemas::insert([
          [
            'fecha' => '2020-01-16',
            'tema'  => 'Perspectivas Tributarias y Laborales 2020',
            'responsable' => 'Tax & Legal',
            'participantes' => '25',
          ],
          [
            'fecha' => '2020-01-23',
            'tema'  => 'Adopción de NIF para Bancos',
            'responsable' => 'Auditoría',
            'participantes' => '25',
          ],
          [
            'fecha' => '2020-02-06',
            'tema'  => 'Principales Obligaciones Legales',
            'responsable' => 'Legal',
            'participantes' => '25',
          ]
          ]);
    } 
}
