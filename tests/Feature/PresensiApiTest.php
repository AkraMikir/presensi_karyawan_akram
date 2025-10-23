<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Karyawan;
use App\Models\Presensi;
use App\Models\perusahaanModel;
use App\Models\Divisi;
use App\Models\Jabatan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tymon\JWTAuth\Facades\JWTAuth;

class PresensiApiTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $user;
    protected $karyawan;
    protected $token;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        
        // Create test data
        $this->user = User::factory()->create();
        $this->token = JWTAuth::fromUser($this->user);
        
        $perusahaan = perusahaanModel::factory()->create();
        $divisi = Divisi::factory()->create(['perusahaan_id' => $perusahaan->id]);
        $jabatan = Jabatan::factory()->create();
        
        $this->karyawan = Karyawan::factory()->create([
            'user_id' => $this->user->id,
            'perusahaan_id' => $perusahaan->id,
            'divisi_id' => $divisi->id,
            'jabatan_id' => $jabatan->id
        ]);
    }

    /** @test */
    public function authenticated_user_can_get_presensi_list()
    {
        Presensi::factory()->count(3)->create(['karyawan_id' => $this->karyawan->id]);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->getJson('/api/presensi');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'success',
                    'data' => [
                        '*' => [
                            'id',
                            'karyawan_id',
                            'tanggal_presensi',
                            'jam_masuk',
                            'jam_keluar',
                            'status',
                            'karyawan' => [
                                'id',
                                'nama',
                                'email'
                            ]
                        ]
                    ]
                ]);
    }

    /** @test */
    public function authenticated_user_can_filter_presensi_by_karyawan()
    {
        $otherKaryawan = Karyawan::factory()->create();
        Presensi::factory()->create(['karyawan_id' => $this->karyawan->id]);
        Presensi::factory()->create(['karyawan_id' => $otherKaryawan->id]);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->getJson('/api/presensi?karyawan_id=' . $this->karyawan->id);

        $response->assertStatus(200);
        $this->assertCount(1, $response->json('data'));
    }

    /** @test */
    public function authenticated_user_can_create_presensi()
    {
        $presensiData = [
            'karyawan_id' => $this->karyawan->id,
            'tanggal_presensi' => now()->toDateString(),
            'jam_masuk' => '08:00:00',
            'status' => 'hadir',
            'keterangan' => 'Test presensi'
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->postJson('/api/presensi', $presensiData);

        $response->assertStatus(201)
                ->assertJson([
                    'success' => true,
                    'message' => 'Presensi created successfully'
                ])
                ->assertJsonStructure([
                    'success',
                    'message',
                    'data' => [
                        'id',
                        'karyawan_id',
                        'tanggal_presensi',
                        'jam_masuk',
                        'status',
                        'karyawan'
                    ]
                ]);

        $this->assertDatabaseHas('presensi', [
            'karyawan_id' => $this->karyawan->id,
            'tanggal_presensi' => $presensiData['tanggal_presensi']
        ]);
    }

    /** @test */
    public function presensi_creation_fails_with_duplicate_date()
    {
        Presensi::factory()->create([
            'karyawan_id' => $this->karyawan->id,
            'tanggal_presensi' => now()->toDateString()
        ]);

        $presensiData = [
            'karyawan_id' => $this->karyawan->id,
            'tanggal_presensi' => now()->toDateString(),
            'status' => 'hadir'
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->postJson('/api/presensi', $presensiData);

        $response->assertStatus(409)
                ->assertJson([
                    'success' => false,
                    'message' => 'Presensi already exists for this date'
                ]);
    }

    /** @test */
    public function authenticated_user_can_get_specific_presensi()
    {
        $presensi = Presensi::factory()->create(['karyawan_id' => $this->karyawan->id]);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->getJson('/api/presensi/' . $presensi->id);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'data' => [
                        'id' => $presensi->id,
                        'karyawan_id' => $presensi->karyawan_id
                    ]
                ]);
    }

    /** @test */
    public function authenticated_user_can_update_presensi()
    {
        $presensi = Presensi::factory()->create(['karyawan_id' => $this->karyawan->id]);

        $updateData = [
            'jam_keluar' => '17:00:00',
            'status' => 'hadir',
            'keterangan' => 'Updated presensi'
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->putJson('/api/presensi/' . $presensi->id, $updateData);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'message' => 'Presensi updated successfully'
                ]);

        $this->assertDatabaseHas('presensi', [
            'id' => $presensi->id,
            'jam_keluar' => '17:00:00',
            'keterangan' => 'Updated presensi'
        ]);
    }

    /** @test */
    public function authenticated_user_can_delete_presensi()
    {
        $presensi = Presensi::factory()->create(['karyawan_id' => $this->karyawan->id]);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->deleteJson('/api/presensi/' . $presensi->id);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'message' => 'Presensi deleted successfully'
                ]);

        $this->assertDatabaseMissing('presensi', ['id' => $presensi->id]);
    }

    /** @test */
    public function authenticated_user_can_check_in()
    {
        $checkInData = [
            'karyawan_id' => $this->karyawan->id,
            'foto_masuk' => 'base64_encoded_image',
            'latitude_masuk' => -6.200000,
            'longitude_masuk' => 106.816666
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->postJson('/api/presensi/check-in', $checkInData);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'message' => 'Check in successful'
                ])
                ->assertJsonStructure([
                    'success',
                    'message',
                    'data' => [
                        'id',
                        'karyawan_id',
                        'tanggal_presensi',
                        'jam_masuk',
                        'status',
                        'karyawan'
                    ]
                ]);

        $this->assertDatabaseHas('presensi', [
            'karyawan_id' => $this->karyawan->id,
            'tanggal_presensi' => now()->toDateString(),
            'status' => 'hadir'
        ]);
    }

    /** @test */
    public function check_in_fails_if_already_checked_in()
    {
        Presensi::factory()->create([
            'karyawan_id' => $this->karyawan->id,
            'tanggal_presensi' => now()->toDateString(),
            'jam_masuk' => '08:00:00'
        ]);

        $checkInData = [
            'karyawan_id' => $this->karyawan->id
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->postJson('/api/presensi/check-in', $checkInData);

        $response->assertStatus(409)
                ->assertJson([
                    'success' => false,
                    'message' => 'Already checked in today'
                ]);
    }

    /** @test */
    public function authenticated_user_can_check_out()
    {
        $presensi = Presensi::factory()->create([
            'karyawan_id' => $this->karyawan->id,
            'tanggal_presensi' => now()->toDateString(),
            'jam_masuk' => '08:00:00',
            'jam_keluar' => null
        ]);

        $checkOutData = [
            'karyawan_id' => $this->karyawan->id,
            'foto_keluar' => 'base64_encoded_image',
            'latitude_keluar' => -6.200000,
            'longitude_keluar' => 106.816666
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->postJson('/api/presensi/check-out', $checkOutData);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'message' => 'Check out successful'
                ]);

        $this->assertDatabaseHas('presensi', [
            'id' => $presensi->id,
            'jam_keluar' => now()->format('H:i:s')
        ]);
    }

    /** @test */
    public function check_out_fails_without_check_in()
    {
        $checkOutData = [
            'karyawan_id' => $this->karyawan->id
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->postJson('/api/presensi/check-out', $checkOutData);

        $response->assertStatus(404)
                ->assertJson([
                    'success' => false,
                    'message' => 'No check in found for today'
                ]);
    }

    /** @test */
    public function unauthenticated_user_cannot_access_presensi_endpoints()
    {
        $response = $this->getJson('/api/presensi');
        $response->assertStatus(401);

        $response = $this->postJson('/api/presensi', []);
        $response->assertStatus(401);

        $response = $this->postJson('/api/presensi/check-in', []);
        $response->assertStatus(401);
    }
}
