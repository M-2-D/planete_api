<?php

namespace Database\Seeders;

use App\Models\evaluation_faite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class EvaluationFaiteSeeder extends Seeder
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
            evaluation_faite::create([
                'eleve_id' => $user->id, // Associé à l'élève
                'nom' => 'Composition', // Exemple de discipline
                'note' => 13.00, // Exemple de classe
                'date' => '2025-03-05', // Exemple de salle
                'heure' => '08:00-10:00', // Exemple d'horaire
            ]);     
            
            evaluation_faite::create([
                'eleve_id' => $user->id, // Associé à l'élève
                'nom' => 'Devoir surveillé', 
                'note' => 15.00, 
                'date' => '2025-03-15',
                'heure' => '10:00-12:00', 
            ]);     
        }
    }
}