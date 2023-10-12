<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName(), 
            'middlename' => fake()->firstName(),
            'lastname' => fake()->lastName(), 
            'nickname' => fake()->firstName(), 
            'agentname' => fake()->name(), 
            'agentofficelocation' => fake()->streetAddress(),
            'artistshowtype' => fake()->word(), 
            'address' => fake()->streetAddress(), 
            'city' => fake()->city(), 
            'natinality' => fake()->word(), 
            'age' => fake()->randomDigitNotZero(1,90), 
            'careerage' => fake()->randomDigitNotZero(1,50), 
            'salary' => fake()->randomFloat(), 
            'phonenumber' => fake()->phoneNumber(), 
            'agentphonenumber' => fake()->phoneNumber(),
            'whatsupnumber' => fake()->phoneNumber(), 
            'telephonenumber' => fake()->phoneNumber(), 
            'gmail' => fake()->email(), 
            'facebook' => fake()->email(), 
            'instagram' => fake()->email(), 
            'twitter' => fake()->email(), 
            'shows_id' => fake()->randomDigitNotZero(1,20)
        ];
    }
}
