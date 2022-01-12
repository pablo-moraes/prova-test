<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "scientific_name" => $this->faker->shuffle($this->faker->name)
        ];
    }
}
