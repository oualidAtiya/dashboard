<?php

namespace Database\Factories;

use App\Models\Bascule;
use App\Models\Client;
use App\Models\Importateur;
use Illuminate\Database\Eloquent\Factories\Factory;

class BasculeFactory extends Factory
{
    protected $model = Bascule::class;

    public function definition()
    {
        return [
            'model' => $this->faker->word,
            'serial_number' => $this->faker->unique()->randomNumber,
            'characteristics' => $this->faker->text,
            'acquisition_date' => $this->faker->date,
            'client_id' => Client::factory(),  // Associates a random client
            'importateur_id' => Importateur::factory(),  // Associates a random Importateur
        ];
    }
}
