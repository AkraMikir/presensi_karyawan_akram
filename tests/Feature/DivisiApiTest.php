<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Divisi;
use App\Models\perusahaanModel;
use App\Models\Karyawan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tymon\JWTAuth\Facades\JWTAuth;

class DivisiApiTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $user;
    protected $token;
    protected $perusahaan;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        
        $this->user = User::factory()->create();
        $this->token = JWTAuth::fromUser($this->user);
        $this->perusahaan = perusahaanModel::factory()->create();
    }

    /** @test */
    public function authenticated_user_can_get_divisi_list()
    {
        Divisi::factory()->count(3)->create(['perusahaan_id' => $this->perusahaan->id]);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->getJson('/api/divisi');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'success',
                    'data' => [
                        '*' => [
                            'id',
                            'nama_divisi',
                            'deskripsi',
                            'kode_divisi',
                            'perusahaan_id',
                            'kepala_divisi_id',
                            'is_active',
                            'created_at',
                            'updated_at',
                            'perusahaan',
                            'karyawan'
                        ]
                    ]
                ]);
    }

    /** @test */
    public function authenticated_user_can_create_divisi()
    {
        $divisiData = [
            'nama_divisi' => 'IT Department',
            'deskripsi' => 'Divisi Teknologi Informasi',
            'kode_divisi' => 'IT001',
            'perusahaan_id' => $this->perusahaan->id,
            'is_active' => true
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->postJson('/api/divisi', $divisiData);

        $response->assertStatus(201)
                ->assertJson([
                    'success' => true,
                    'message' => 'Divisi created successfully'
                ])
                ->assertJsonStructure([
                    'success',
                    'message',
                    'data' => [
                        'id',
                        'nama_divisi',
                        'deskripsi',
                        'kode_divisi',
                        'perusahaan_id',
                        'is_active',
                        'perusahaan'
                    ]
                ]);

        $this->assertDatabaseHas('divisi', [
            'nama_divisi' => 'IT Department',
            'kode_divisi' => 'IT001',
            'perusahaan_id' => $this->perusahaan->id
        ]);
    }

    /** @test */
    public function divisi_creation_fails_with_invalid_data()
    {
        $divisiData = [
            'nama_divisi' => '', // Required field empty
            'kode_divisi' => '', // Required field empty
            'perusahaan_id' => 999, // Non-existent perusahaan
            'is_active' => 'invalid_boolean' // Invalid boolean
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->postJson('/api/divisi', $divisiData);

        $response->assertStatus(422)
                ->assertJsonStructure([
                    'success',
                    'message',
                    'errors' => [
                        'nama_divisi',
                        'kode_divisi',
                        'perusahaan_id',
                        'is_active'
                    ]
                ]);
    }

    /** @test */
    public function divisi_creation_fails_with_duplicate_kode_divisi()
    {
        Divisi::factory()->create(['kode_divisi' => 'IT001']);

        $divisiData = [
            'nama_divisi' => 'Another IT Department',
            'kode_divisi' => 'IT001', // Duplicate kode_divisi
            'perusahaan_id' => $this->perusahaan->id
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->postJson('/api/divisi', $divisiData);

        $response->assertStatus(422)
                ->assertJsonStructure([
                    'success',
                    'message',
                    'errors' => [
                        'kode_divisi'
                    ]
                ]);
    }

    /** @test */
    public function authenticated_user_can_get_specific_divisi()
    {
        $divisi = Divisi::factory()->create(['perusahaan_id' => $this->perusahaan->id]);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->getJson('/api/divisi/' . $divisi->id);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'data' => [
                        'id' => $divisi->id,
                        'nama_divisi' => $divisi->nama_divisi
                    ]
                ]);
    }

    /** @test */
    public function get_divisi_returns_404_for_nonexistent_id()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->getJson('/api/divisi/999');

        $response->assertStatus(404)
                ->assertJson([
                    'success' => false,
                    'message' => 'Divisi not found'
                ]);
    }

    /** @test */
    public function authenticated_user_can_update_divisi()
    {
        $divisi = Divisi::factory()->create(['perusahaan_id' => $this->perusahaan->id]);

        $updateData = [
            'nama_divisi' => 'Updated IT Department',
            'deskripsi' => 'Updated description',
            'kode_divisi' => 'IT002'
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->putJson('/api/divisi/' . $divisi->id, $updateData);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'message' => 'Divisi updated successfully'
                ]);

        $this->assertDatabaseHas('divisi', [
            'id' => $divisi->id,
            'nama_divisi' => 'Updated IT Department',
            'kode_divisi' => 'IT002'
        ]);
    }

    /** @test */
    public function authenticated_user_can_set_kepala_divisi()
    {
        $divisi = Divisi::factory()->create(['perusahaan_id' => $this->perusahaan->id]);
        $karyawan = Karyawan::factory()->create(['perusahaan_id' => $this->perusahaan->id]);

        $updateData = [
            'kepala_divisi_id' => $karyawan->id
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->putJson('/api/divisi/' . $divisi->id, $updateData);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'message' => 'Divisi updated successfully'
                ]);

        $this->assertDatabaseHas('divisi', [
            'id' => $divisi->id,
            'kepala_divisi_id' => $karyawan->id
        ]);
    }

    /** @test */
    public function authenticated_user_can_delete_divisi()
    {
        $divisi = Divisi::factory()->create(['perusahaan_id' => $this->perusahaan->id]);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->deleteJson('/api/divisi/' . $divisi->id);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'message' => 'Divisi deleted successfully'
                ]);

        $this->assertDatabaseMissing('divisi', ['id' => $divisi->id]);
    }

    /** @test */
    public function unauthenticated_user_cannot_access_divisi_endpoints()
    {
        $response = $this->getJson('/api/divisi');
        $response->assertStatus(401);

        $response = $this->postJson('/api/divisi', []);
        $response->assertStatus(401);

        $response = $this->getJson('/api/divisi/1');
        $response->assertStatus(401);

        $response = $this->putJson('/api/divisi/1', []);
        $response->assertStatus(401);

        $response = $this->deleteJson('/api/divisi/1');
        $response->assertStatus(401);
    }
}
