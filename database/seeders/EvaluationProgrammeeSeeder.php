<?php

namespace Database\Seeders;

use App\Models\EvaluationProgrammee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class EvaluationProgrammeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer des utilisateurs (élèves) existants
        $users = User::all();

        foreach ($users as $user)
        {
            EvaluationProgrammee::create([
                'eleve_id' => $user->id, // Associé à l'élève
                'nom' => 'Devoir surveillé', 
                'note' => 'Aucune note disponible', 
                'description' => 'Programmée', 
                'salle' => 'Salle 2',
                'date' => '2025-03-20', 
                'heure' => '08:00-10:00', 
            ]);

            EvaluationProgrammee::create([
                'eleve_id' => $user->id, // Associé à l'élève
                'nom' => 'Devoir surveillé', 
                'note' => 'Aucune note disponible', 
                'description' => 'Programmée', 
                'salle' => 'Salle 2',
                'date' => '2025-03-19', 
                'heure' => '08:00-10:00', 
            ]);
        }
    }
}