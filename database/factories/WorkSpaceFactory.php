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
            'region' => $this->faker->name,
            'zipCode' => $this->faker->countryCode,
            'departement' => $this->faker->name,
            'city' => $this->faker->city,
            'latitude' => $this->faker->unique()->latitude,
            'longitude' => $this->faker->unique()->longitude,
        ];
    }
}
