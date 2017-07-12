<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'name'=> 'Eike Santiago',
        'email' => 'eikesantz@hotmail.com',
        'password' => bcrypt('eike123'),
        'type' => 'admin',
        'phone' => '82999302626',
        'sindico' => '0',
      ]);
    }
}
