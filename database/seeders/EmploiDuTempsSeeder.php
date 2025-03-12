<?php

namespace Database\Seeders;

use App\Models\EmploiDuTemps;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class EmploiDuTempsSeeder extends Seeder
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
            EmploiDuTemps::create([
                'eleve_id' => $user->id, // Associé à l'élève
                'date' => 'Ven, 31 Janv, 2025', 
                'discipline' => 'histoire geographie', 
                'heure' => '08:00-10:00', 
                'professeur' => 'Mr NDIAYE', 
                'salle' => 'Salle 2',
            ]);

            EmploiDuTemps::create([
                'eleve_id' => $user->id, // Associé à l'élève
                'date' => 'Ven, 31 Janv, 2025', 
                'discipline' => 'mathematiquese', 
                'heure' => '10:00-12:00', 
                'professeur' => 'Mr SANE', 
                'salle' => 'Salle 2',
            ]);

            EmploiDuTemps::create([
                'eleve_id' => $user->id, // Associé à l'élève
                'date' => 'Ven, 31 Janv, 2025', 
                'discipline' => 'Anglais', 
                'heure' => '12:00-14:00', 
                'professeur' => 'Mme DIENG', 
                'salle' => 'Salle 2',
            ]);
        }
    }
}