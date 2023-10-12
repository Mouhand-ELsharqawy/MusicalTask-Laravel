<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Show>
 */
class ShowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->date(), 
            'spouncerfirstname' => fake()->firstName(), 
            'spouncermiddlename' => fake()->firstName(), 
            'spouncerlastname' => fake()->lastName(), 
            'spouncerphone' => fake()->phoneNumber(), 
            'spouncerofficephone' => fake()->phoneNumber(), 
            'spouncergmail' => fake()->email(), 
            'starttime' => fake()->time(), 
            'endtime' => fake()->time(), 
            'noramlticketsalary' => fake()->randomFloat(), 
            'firstclassticketsalary' => fake()->randomFloat(), 
            'attendancenumber' => fake()->randomFloat(), 
            'fees' => fake()->randomFloat(), 
            'artistsnumber' => fake()->randomFloat(), 
            'showtype' => fake()->word()
        ];
    }
}
