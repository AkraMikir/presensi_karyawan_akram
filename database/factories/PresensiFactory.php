<?php

namespace Database\Factories;

use App\Models\Presensi;
use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Presensi>
 */
class PresensiFactory extends Factory
{
    protected $model = Presensi::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tanggal = $this->faker->dateTimeBetween('-30 days', 'now');
        $jamMasuk = $this->faker->time('H:i:s', '09:00:00');
        $jamKeluar = $this->faker->time('H:i:s', '17:00:00');
        
        return [
            'karyawan_id' => Karyawan::factory(),
            'tanggal_presensi' => $tanggal->format('Y-m-d'),
            'jam_masuk' => $jamMasuk,
            'jam_keluar' => $this->faker->boolean(80) ? $jamKeluar : null, // 80% chance of having checkout time
            'foto_masuk' => $this->faker->optional(0.7)->imageUrl(640, 480, 'people'),
            'foto_keluar' => $this->faker->optional(0.5)->imageUrl(640, 480, 'people'),
            'latitude_masuk' => $this->faker->latitude(-6.5, -5.5),
            'longitude_masuk' => $this->faker->longitude(106.0, 107.0),
            'latitude_keluar' => $this->faker->optional(0.5)->latitude(-6.5, -5.5),
            'longitude_keluar' => $this->faker->optional(0.5)->longitude(106.0, 107.0),
            'status' => $this->faker->randomElement(['hadir', 'terlambat', 'tidak_hadir', 'cuti', 'sakit']),
            'keterangan' => $this->faker->optional(0.3)->sentence(),
        ];
    }
}
