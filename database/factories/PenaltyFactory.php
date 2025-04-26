<?php
namespace Database\Factories;

use App\Models\Penalty;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenaltyFactory extends Factory
{
    protected $model = Penalty::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => Client::inRandomOrder()->first()->id,  // Random client from the clients table
            'amount' => $this->faker->randomFloat(2, 50, 200),  // Random penalty amount between 50 and 200 DH
            'date_issued' => $this->faker->dateTimeBetween('-30 days', 'now'),  
            'revision_id' => \App\Models\RevisionMetrologique::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
