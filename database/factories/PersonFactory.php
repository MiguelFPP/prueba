<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'name' => $this->faker->name(),
            'surname' => $this->faker->name(),
            'identification' => $this->faker->numerify('###########'),
            'email' => $this->faker->email(),
            'country' => $this->faker->randomElement(['Colombia', 'Panama', 'Ecuador', 'Argentina', 'Peru']),
            'addres' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'category_id' => Category::all()->random()->id
        ];
    }
}
