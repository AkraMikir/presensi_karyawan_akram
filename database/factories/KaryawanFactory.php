<?php

namespace Database\Factories;

use App\Models\Karyawan;
use App\Models\User;
use App\Models\perusahaanModel;
use App\Models\Divisi;
use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    protected $model = Karyawan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'nik' => $this->faker->unique()->numerify('##########'),
            'tanggal_lahir' => $this->faker->date('Y-m-d', '2000-01-01'),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'perusahaan_id' => perusahaanModel::factory(),
            'divisi_id' => Divisi::factory(),
            'jabatan_id' => Jabatan::factory(),
            'telepon' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            'tanggal_masuk' => $this->faker->date('Y-m-d', 'now'),
            'status' => 'aktif',
        ];
    }
}
