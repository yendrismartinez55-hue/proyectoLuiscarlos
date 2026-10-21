<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        // Buscamos al administrador para asignarlo como creador de las tareas
        $admin = User::where('email', 'admin@taskflow.test')->first();

        // Recorremos todos los proyectos existentes
        Project::all()->each(function (Project $project) use ($admin) {
            // Obtenemos los participantes adjuntos a este proyecto específico
            $participants = $project->participants;

            foreach ($participants as $participant) {
                // Creamos las 2 tareas para cada participante dentro del proyecto
                Task::factory(2)
                    ->for($project)
                    ->for($participant, 'assignee')
                    ->for($admin, 'creator')
                    ->create();
            }
        });
    }
}
