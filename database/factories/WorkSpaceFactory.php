<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkSpace>
 */
class WorkSpaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->userName,
            'description' => $this->faker->text,
            'region' => $this->faker->name,
            'zipCode' => $this->faker->numberBetween(1, 99999),
            'departement' => $this->faker->name,
            'city' => $this->faker->city,
            'latitude' => $this->faker->unique()->latitude,
            'longitude' => $this->faker->unique()->longitude,
            'surface' => $this->faker->numberBetween(15, 200),
            'desk' => $this->faker->numberBetween(1, 10),
            'computerScreen' => $this->faker->numberBetween(1, 10),
            'projector' => $this->faker->numberBetween(1, 10),
            'parking' => $this->faker->boolean,
            'kitchen' => $this->faker->boolean,
            'handicappedPersonsAccess' => $this->faker->boolean,
        ];
    }
}
