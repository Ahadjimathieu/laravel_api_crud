<?php

namespace Database\Seeders;

use App\Models\Classe;
use Database\Factories\EtudiantFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $classe1 = Classe::factory()->create([
            'libelle' => '6 eme',
        ]);
        $classe2 = Classe::factory()->create([
            'libelle' => '5 eme',
        ]);
        $classe3 = Classe::factory()->create([
            'libelle' => '4 eme',
        ]);

        $classe4 = Classe::factory()->create([
            'libelle' => '3 eme',
        ]);
        $classe5 = Classe::factory()->create([
            'libelle' => '2 nd',
        ]);
        $classe6 = Classe::factory()->create([
            'libelle' => '1 ere',
        ]);

        $classe7 = Classe::factory()->create([
            'libelle' => 'Tle',
        ]);

       $this->call(EtudiantSeeder::class);
    }
}
