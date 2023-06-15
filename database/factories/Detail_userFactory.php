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
            'user_id'=>$this->faker->unique()->numberBetween(1,11),
            'company_id'=>$this->faker->numberBetween(10,10),
            'no_pegawai'=>$this->faker->unique()->numerify('######'),
            'nik'=>$this->faker->unique()->numerify('################'),
            'gender'=>$this->faker->randomElement(['MALE','FEMALE']),
            'npwp'=>$this->faker->unique()->numerify('############'),
            'tempat_lahir'=>$this->faker->city(),
            'tgl_lahir'=>$this->faker->date(),
            'no_hp'=>$this->faker->e164PhoneNumber(),
            'alamat'=>$this->faker->streetAddress(),
            'rt'=>$this->faker->numerify('##'),
            'rw'=>$this->faker->numerify('##'),
            'kelurahan'=>$this->faker->citySuffix(),
            'kecamatan'=>$this->faker->citySuffix(),
            'kabupaten'=>$this->faker->city(),
            'provinsi'=>$this->faker->state(),
            'nama_ibu'=>$this->faker->name($gender='female'),
            'avatar'=>$this->faker->file('public', 'storage', true),
        ];
    }
}
