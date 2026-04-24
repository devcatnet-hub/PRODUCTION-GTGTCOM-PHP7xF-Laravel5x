<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Menu::insert([
        [
        'group' => 'root',
        'title'  => 'Grupos y Usuarios',
        'link' => '#',
        'icon' => 'supervisor_account',
        'parent' => 0,
        'order' => 0,
        'enabled' => 1,
      ],
      [
        'group' => 'root',
        'title'  => 'Nuevo Usuario',
        'link' => '/register',
        'icon' => '.',
        'parent' => 1,
        'order' => 0,
        'enabled' => 1,
      ],
      [
        'group' => 'root',
        'title'  => 'Administrar Usuarios',
        'link' => '/userslist',
        'icon' => '.',
        'parent' => 1,
        'order' => 1,
        'enabled' => 1,
      ],
      [
        'group' => 'root',
        'title'  => 'dropdown-divider',
        'link' => '#',
        'icon' => '.',
        'parent' => 1,
        'order' => 2,
        'enabled' => 1,
      ],
      [
        'group' => 'root',
        'title'  => 'Nuevo Grupo',
        'link' => '/groupnew',
        'icon' => '.',
        'parent' => 1,
        'order' => 3,
        'enabled' => 1,
      ],
      [
        'group' => 'root',
        'title'  => 'Administrar Grupos',
        'link' => '/grouplist',
        'icon' => '.',
        'parent' => 1,
        'order' => 4,
        'enabled' => 1,
      ]
      ]);
    }
}
