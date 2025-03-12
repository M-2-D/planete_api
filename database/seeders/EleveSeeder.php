<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Eleve; 

class EleveSeeder extends Seeder
{
    public function run(): void
    {
        Eleve::create([
            'ien' => '23789',
            'nom' => 'SIMEN',
            'prenom' => 'Anta',
            'classe' => '5° A',
            'etablissement' => 'ETABLISSEMENT SIMEN FORMATION',
        ]);

        Eleve::create([
            'ien' => '78890',
            'nom' => 'SIMEN',
            'prenom' => 'Fatima',
            'classe' => '5° A',
            'etablissement' => 'ETABLISSEMENT SIMEN FORMATION',
        ]);
    }

}
