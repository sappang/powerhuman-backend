<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penempatan>
 */
class PenempatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>$this->faker->unique()->numberBetween(1,10),
            'bagian_id'=>$this->faker->numberBetween(1,10),
            'no_sk'=>$this->faker->numerify('###/HRD/BYORKA/1993'),
            'tmt'=>$this->faker->dateTime(),
            'file_sk'=>$this->faker->file('public', 'storage', true),
        ];
    }
}
