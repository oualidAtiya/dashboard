<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Importateur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition(): array
    {
        return [
            'contact_last_name' => $this->faker->firstName,
            'contact_first_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'address' => $this->faker->address,
            'importateur_id' => Importateur::factory(),  // Associates a random Importateur
        ];
    }
}
