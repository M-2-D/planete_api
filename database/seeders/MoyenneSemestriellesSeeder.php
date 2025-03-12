<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
 

class MoyenneSemestriellesSeeder extends Seeder
{
    public function run()
    {
        
        $users = User::all();

        foreach ($users as $user) {
            DB::table('moyenne_semestrielles')->insert([
                [
                    'eleve_id' => $user->id,
                    'discipline' => 'Mathématiques',
                    'moy_devoirs' => 12.5,
                    'notes_compos' => 14,
                    'moyenne' => 13.25,
                    'rang' => 3,
                    'appreciation' => 'Bien',
                    'semestre' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'eleve_id' => $user->id,
                    'discipline' => 'Histoire-Géographie',
                    'moy_devoirs' => 11,
                    'notes_compos' => 10,
                    'moyenne' => 10.5,
                    'rang' => 6,
                    'appreciation' => 'Passable',
                    'semestre' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }
}
