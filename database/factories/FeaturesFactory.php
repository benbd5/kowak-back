<?php

namespace Database\Factories;

use App\Models\WorkSpace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Features>
 */
class FeaturesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'surface' => $this->faker->numberBetween(15, 200),
            'desk' => $this->faker->numberBetween(1, 10),
            'computerScreen' => $this->faker->numberBetween(1, 10),
            'projector' => $this->faker->numberBetween(1, 10),
            'parking' => $this->faker->boolean,
            'kitchen' => $this->faker->boolean,
            'handicappedPersonsAccess' => $this->faker->boolean,
            'workSpaceId' => function () {
                return WorkSpace::factory()->create()->id;
            },
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
