<?php

use App\Grupo;
use Illuminate\Database\Seeder;

class GruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grupo::create([
          'group' => 'root',
          'name'  => 'Administradores',
          'author' => 'APP'
        ]);
    }
}
