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
            'desk' => $this->faker->numberBetween(1, 10),
            'computerScreen' => $this->faker->numberBetween(1, 10),
//          'projector' => $this->faker->numberBetween(1, 10),
//          'whiteboard' => $this->faker->numberBetween(1, 10),
            'kitchen' => $this->faker->boolean,
            'handicappedPersonsAccess' => $this->faker->boolean,
            'workSpaceId' => function () {
                return WorkSpace::factory()->create()->id;
            },
        ];
    }
}
