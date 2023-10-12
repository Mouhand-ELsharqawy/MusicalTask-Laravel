<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venue>
 */
class VenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city' => fake()->city(), 
            'square' => fake()->word(), 
            'street' => fake()->streetAddress(), 
            'name' => fake()->name(), 
            'locationingoogleearth' => fake()->streetAddress(), 
            'capacity' => fake()->randomFloat(), 
            'salaryperday' => fake()-> randomFloat(), 
            'locationmanagerfirstname' => fake()->firstName(), 
            'locationmanagermiddlename' => fake()->firstName(), 
            'locationmanagerlastname' => fake()->lastName(), 
            'locationinmanagerphone' => fake()->phoneNumber(), 
            'locationinmanagertelephone' => fake()->phoneNumber(), 
            'locationintelephone' => fake()->phoneNumber(),
            'shows_id' => fake()->randomDigitNotZero(1,20)
        ];
    }
}
