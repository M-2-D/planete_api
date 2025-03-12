<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Ajouter l'importation du modèle User
use App\Models\Planning; // Ajouter l'importation du modèle Planning

class PlanningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer des utilisateurs (élèves) existants
        $users = User::all();

        // Ajouter des plannings pour chaque utilisateur
        foreach ($users as $user) {
            Planning::create([
                'eleve_id' => $user->id, // Associé à l'élève
                'discipline' => 'Science de la vie et de la terre', // Exemple de discipline
                'classe' => '5°A', // Exemple de classe
                'salle' => 'Salle 1', // Exemple de salle
                'heure' => '08:00-10:00', // Exemple d'horaire
                'date' => '2025-03-05', // Exemple de date (dans le mois à venir)
            ]);

            Planning::create([
                'eleve_id' => $user->id, // Associé à l'élève
                'discipline' => 'Histoire Geographie', // Exemple de discipline
                'classe' => '5°A', // Exemple de classe
                'salle' => 'Salle 1', // Exemple de salle
                'heure' => '10:00-12:00', // Exemple d'horaire
                'date' => '2025-03-05', // Exemple de date (dans le mois à venir)
            ]);
        }
    }
}
