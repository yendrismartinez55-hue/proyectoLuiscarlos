<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,    // 1. Genera los usuarios necesarios
            ProjectSeeder::class, // 2. Genera proyectos ligados a esos usuarios
            TaskSeeder::class,    // 3. Genera tareas ligadas a los proyectos y participantes
        ]);
    }
}
