<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
			'full_name'=>$this->faker->name(),
	        'number'=>$this->faker->phoneNumber(),
			'username'=>$this->faker->userName(),
	        'email'=>$this->faker->email(),
	        'password'=> Hash::make('password')
        ];
    }
}
