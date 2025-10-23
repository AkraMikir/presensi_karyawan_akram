<?php

namespace Database\Factories;

use App\Models\Divisi;
use App\Models\perusahaanModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Divisi>
 */
class DivisiFactory extends Factory
{
    protected $model = Divisi::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_divisi' => $this->faker->randomElement([
                'IT Department',
                'Human Resources',
                'Finance',
                'Marketing',
                'Operations',
                'Customer Service',
                'Research & Development'
            ]),
            'deskripsi' => $this->faker->paragraph(),
            'kode_divisi' => $this->faker->unique()->regexify('[A-Z]{2}[0-9]{3}'),
            'perusahaan_id' => perusahaanModel::factory(),
            'kepala_divisi_id' => null,
            'is_active' => $this->faker->boolean(80), // 80% chance of being active
        ];
    }
}
