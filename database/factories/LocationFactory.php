<?php

namespace Database\Factories;

use App\Models\Users;
use App\Models\WorkSpace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'startDate' => now()->subDays(rand(1, 30)),
            'endDate' => now()->addDays(rand(1, 30)),
            'workSpaceId' => WorkSpace::query()->inRandomOrder()->first()->id,
            'userId' => Users::query()->inRandomOrder()->first()->id,
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
