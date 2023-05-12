<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detail_user>
 */
class Detail_userFactory extends Factory
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
            'company_id'=>$this->faker->numberBetween(10,10),
            'no_pegawai'=>$this->faker->unique()->numerify('######'),
            'nik'=>$this->faker->unique()->numerify('################'),
            'npwp'=>$this->faker->unique()->numerify('############'),
            'tempat_lahir'=>$this->faker->city(),
            'tgl_lahir'=>$this->faker->date(),
            'no_hp'=>$this->faker->e164PhoneNumber(),
            'alamat'=>$this->faker->streetAddress(),
            'file_sk'=>$this->faker->file('public', 'storage', true),
        ];
    }
}
