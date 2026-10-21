<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Busca si ya existe el admin; si no existe, lo crea
        User::firstOrCreate(
            ['email' => 'admin@taskflow.test'],
            [
                'name' => 'Administrador TaskFlow',
                'password' => bcrypt('password'), // Asegúrate de asignarle una contraseña por defecto si la requiere tu factory
            ]
        );

        // Crea los 8 colaboradores adicionales
        User::factory(8)->create();
    }
}
