<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Discipline;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Discipline::create(['nom' => 'histoire_geographie']);
        Discipline::create(['nom' => 'Science de la vie et de la terre']);
        Discipline::create(['nom' => 'français']);
    }
}
