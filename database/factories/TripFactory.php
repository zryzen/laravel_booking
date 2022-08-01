<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'title' => $this->faker->unique()->city(),
            'slug' => $this->faker->unique()->slug(),
            'description' => $this->faker->address(),
            'location' => $this->faker->address(),
            'price' => $this->faker->numberBetween(400,12000),
            'start_date' => $this->faker->dateTimeBetween('now','+7 days'),
            'end_date' =>  $this->faker->dateTimeBetween('+10 days','+50 days')
        ];

    }
}
