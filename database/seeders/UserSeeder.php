<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nom' => ' SIMEN',
            'prenom' => 'Mame Diarra',
            'ien' => '12345',
            'password' => Hash::make('passer'),
        ]);
    }
}

