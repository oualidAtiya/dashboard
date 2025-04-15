<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Importateur;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Importateur>
 */
class ImportateurFactory extends Factory
{
    protected $model = Importateur::class;

    public function definition(): array
    {
        return [
            'company_name' => $this->faker->company,
            'contact_last_name' => $this->faker->firstName,
            'contact_first_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'address' => $this->faker->address,
        ];
    }
}
