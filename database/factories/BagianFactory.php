<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bagian>
 */
class BagianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kd_bagian'=>$this->faker->unique()->numerify('######'),
            'nama_bagian'=>$this->faker->jobTitle(),
            'no_sk_berdiri'=>$this->faker->numerify('###/AU/BYORKA/1993'),
            'tgl_sk'=>$this->faker->dateTime(),
            'file_sk'=>$this->faker->file('public', 'storage', true),
        ];
    }
}
