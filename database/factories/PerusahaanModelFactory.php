<?php

namespace Database\Factories;

use App\Models\perusahaanModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\perusahaanModel>
 */
class PerusahaanModelFactory extends Factory
{
    protected $model = perusahaanModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->company(),
            'alamat' => $this->faker->address(),
            'latitude' => $this->faker->latitude(-6.5, -5.5),
            'longitude' => $this->faker->longitude(106.0, 107.0),
            'telepon' => $this->faker->phoneNumber(),
            'email' => $this->faker->companyEmail(),
        ];
    }
}
