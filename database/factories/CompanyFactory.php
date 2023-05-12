<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kd_company'=>$this->faker->unique()->numerify('######'),
            'name'=>$this->faker->company(),
            'logo'=>$this->faker->imageUrl(),
        ];
    }
}
