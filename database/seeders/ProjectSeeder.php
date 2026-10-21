<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Buscamos el admin por su correo y traemos los demás colaboradores
        $admin = User::where('email', 'admin@taskflow.test')->first();
        $collaborators = User::where('email', '!=', 'admin@taskflow.test')->get();

        // Creamos los 4 proyectos asignados al admin
        Project::factory(4)
            ->for($admin, 'creator')
            ->create()
            ->each(function (Project $project) use ($collaborators) {
                // Selecciona 3 colaboradores aleatorios y los adjunta al proyecto
                $participants = $collaborators->random(3);
                $project->participants()->attach($participants);
            });
    }
}
