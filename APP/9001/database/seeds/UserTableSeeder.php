<?php

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::create([
            'fname' => 'System',
            'lname'  => 'Administrator',
            'username'   => 'admin',
            'email'      => 'storage.catnet@gmail.com',
            'password'   =>  Hash::make('secret'),
            'group' => 'root',
            'attrib' => 'activo',
            'status' => 'Creado',
            'author' => 'APP'
        ]);
    }

}
