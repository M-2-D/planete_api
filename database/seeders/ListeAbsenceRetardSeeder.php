<?php

namespace Database\Seeders;

use App\Models\ListeAbsenceRetard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class ListeAbsenceRetardSeeder extends Seeder
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
            ListeAbsenceRetard::create([
                'eleve_id' => $user->id, // Associé à l'élève
                'type' => 'Retard, 23min', 
                'date' => '29-01-2025', 
                'heure' => '10:00-12:00', 
                'discipline' => 'Mathematiques', 
                'justification' => 'Justifié', 
            ]);

            ListeAbsenceRetard::create([
                'eleve_id' => $user->id, // Associé à l'élève
                'type' => 'Absence', 
                'date' => '31-01-2025', 
                'heure' => '08:00-14:00', 
                'discipline' => 'français, svt, anglais', 
                'justification' => 'Justifié', 
            ]);

            ListeAbsenceRetard::create([
                'eleve_id' => $user->id, // Associé à l'élève
                'type' => 'Absence', 
                'date' => '03-02-2025', 
                'heure' => '08:00-10:00', 
                'discipline' => 'histoire geographie', 
                'justification' => 'Non justifié', 
            ]);
        }
    }
}