<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RevisionMetrologique;
use App\Models\Bascule;
class RevisionMetrologiqueFactory extends Factory
{
    protected $model = RevisionMetrologique::class;

    public function definition()
    {
        return [
            'scale_id' => Bascule::factory(),  // Associates a random bascule
            'last_revision_date' => $this->faker->date,
            'status' => $this->faker->randomElement(['completed', 'pending']),
            'verification_report' => $this->faker->text,
            'verification_responsible' => $this->faker->name,
        ];
    }
}
