<?php

namespace Database\Factories;

use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jabatan>
 */
class JabatanFactory extends Factory
{
    protected $model = Jabatan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_jabatan' => $this->faker->jobTitle(),
            'deskripsi' => $this->faker->paragraph(),
            'gaji_pokok' => $this->faker->numberBetween(3000000, 15000000),
            'level_jabatan' => $this->faker->randomElement(['Junior', 'Senior', 'Lead', 'Manager', 'Director']),
            'is_active' => $this->faker->boolean(80), // 80% chance of being active
        ];
    }
}
