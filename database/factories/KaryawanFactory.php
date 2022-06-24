<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //name
            'name' => $this->faker->name,
            //nik
            'nik' => $this->faker->unique()->numberBetween(1, 100),
            //jenis_kelamin
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            //tempat_lahir
            'tempat_lahir' => $this->faker->city,
            //tanggal_lahir
            'tanggal_lahir' => $this->faker->dateTimeBetween('-30 years', '-18 years'),
            //alamat
            'alamat' => $this->faker->address,
            //jabatan
            'jabatan' => $this->faker->randomElement(['Karyawan', 'Manager', 'Supervisor', 'Admin']),
            //no_telp
            'no_telp' => $this->faker->phoneNumber,
        ];
    }
}
