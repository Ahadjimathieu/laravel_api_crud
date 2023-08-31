<?php

namespace Database\Seeders;

use App\Models\Etudiant;
use Database\Factories\EtudiantFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Etudiant::factory(5)->create();
    }
}
