<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'email' => 'basis@teste.com',
            'email_verified_at' => '2021-01-30',
            'id' => 1,
            'name' => 'Usuario Basis',
            'password' => '$2y$10$VzLEGBxXHgRqY.Exl/OJfOTAY.177kthslkiaNn3aUT.LHuo0Ztee',
        ];

        User::insert($user);

        $user = [
            'email' => 'teste@teste.com',
            'email_verified_at' => '2021-02-30',
            'id' => 2,
            'name' => 'Usuario Teste',
            'password' => '$2y$10$VzLEGBxXHgRqY.Exl/OJfOTAY.177kthslkiaNn3aUT.LHuo0Ztee',
        ];

        User::insert($user);
        User::factory(10)->create();
    }
}
