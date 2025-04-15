<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RevisionMetrologique;

class RevisionMetrologiqueSeeder extends Seeder
{
    public function run()
    {
        RevisionMetrologique::factory()->count(30)->create();  // Creates 10 random revisions
    }
}
