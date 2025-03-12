<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(EleveSeeder::class);
        $this->call([PlanningSeeder::class,]);
        $this->call([DisciplineSeeder::class,]);
        $this->call(EvaluationFaiteSeeder::class);
        $this->call(EvaluationProgrammeeSeeder::class);
        $this->call(EmploiDuTempsSeeder::class);
        $this->call(ListeAbsenceRetardSeeder::class);
        $this->call(MoyenneSemestriellesSeeder::class);
        $this->call(BulletinSemestrielSeeder::class);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
