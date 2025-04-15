<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Importateur;

class ImportateursSeeder extends Seeder
{
    public function run(): void
    {
        Importateur::factory()->count(30)->create();  // This will create 10 importateurs
    }
}
