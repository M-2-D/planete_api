<?php

namespace Database\Seeders;

use App\Models\BulletinSemestriel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;use App\Models\User;

class BulletinSemestrielSeeder extends Seeder
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
            BulletinSemestriel::create([
                'eleve_id' => $user->id, // Associer au bon élève
                'nom' => $user->nom ?? 'Mame Diarra SIMEN',  
                'semestre' => 1, 
                'annee' => 2025, 
                'moyenne' => rand(10, 18), // Valeur aléatoire pour éviter les doublons
                'classement' => rand(1, 10), // Classement aléatoire
                'pdf_url' => "https://mon-serveur.com/bulletins/{$user->ien}_2024_S1.pdf" // Générer un URL dynamique
            ]);
        }
    }
}