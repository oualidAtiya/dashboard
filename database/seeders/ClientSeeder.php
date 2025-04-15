<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ImportateursSeeder extends Seeder
{
    public function run(): void
    {
        Client::factory()->count(30)->create();  // This will create 10 importateurs
    }
}
