<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "price" => rand(1000000, 10000000),
            'img' => "",
            'description'=>"",
            "created_at" => date_create(),
        ];
    }
}
