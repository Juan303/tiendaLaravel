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
            'name' => 'Juan',
            'email' => 'gdf000@hotmail.com',
            'password' => bcrypt('2501303'),
            'admin' => true
        ]);
    }
}
