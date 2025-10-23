<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\perusahaanModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tymon\JWTAuth\Facades\JWTAuth;

class PerusahaanApiTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $user;
    protected $token;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        
        $this->user = User::factory()->create();
        $this->token = JWTAuth::fromUser($this->user);
    }

    /** @test */
    public function authenticated_user_can_get_perusahaan_list()
    {
        perusahaanModel::factory()->count(3)->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->getJson('/api/perusahaan');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'success',
                    'data' => [
                        '*' => [
                            'id',
                            'nama',
                            'alamat',
                            'latitude',
                            'longitude',
                            'telepon',
                            'email',
                            'created_at',
                            'updated_at'
                        ]
                    ]
                ]);
    }

    /** @test */
    public function authenticated_user_can_create_perusahaan()
    {
        $perusahaanData = [
            'nama' => 'PT Test Company',
            'alamat' => 'Jl. Test No. 123',
            'latitude' => -6.200000,
            'longitude' => 106.816666,
            'telepon' => '021-1234567',
            'email' => 'test@company.com'
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->postJson('/api/perusahaan', $perusahaanData);

        $response->assertStatus(201)
                ->assertJson([
                    'success' => true,
                    'message' => 'Perusahaan created successfully'
                ])
                ->assertJsonStructure([
                    'success',
                    'message',
                    'data' => [
                        'id',
                        'nama',
                        'alamat',
                        'latitude',
                        'longitude',
                        'telepon',
                        'email'
                    ]
                ]);

        $this->assertDatabaseHas('perusahaan', [
            'nama' => 'PT Test Company',
            'email' => 'test@company.com'
        ]);
    }

    /** @test */
    public function perusahaan_creation_fails_with_invalid_data()
    {
        $perusahaanData = [
            'nama' => '', // Required field empty
            'alamat' => '', // Required field empty
            'email' => 'invalid-email' // Invalid email format
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->postJson('/api/perusahaan', $perusahaanData);

        $response->assertStatus(422)
                ->assertJsonStructure([
                    'success',
                    'message',
                    'errors' => [
                        'nama',
                        'alamat',
                        'email'
                    ]
                ]);
    }

    /** @test */
    public function authenticated_user_can_get_specific_perusahaan()
    {
        $perusahaan = perusahaanModel::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->getJson('/api/perusahaan/' . $perusahaan->id);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'data' => [
                        'id' => $perusahaan->id,
                        'nama' => $perusahaan->nama
                    ]
                ]);
    }

    /** @test */
    public function get_perusahaan_returns_404_for_nonexistent_id()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->getJson('/api/perusahaan/999');

        $response->assertStatus(404)
                ->assertJson([
                    'success' => false,
                    'message' => 'Perusahaan not found'
                ]);
    }

    /** @test */
    public function authenticated_user_can_update_perusahaan()
    {
        $perusahaan = perusahaanModel::factory()->create();

        $updateData = [
            'nama' => 'Updated Company Name',
            'alamat' => 'Updated Address',
            'telepon' => '021-7654321'
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->putJson('/api/perusahaan/' . $perusahaan->id, $updateData);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'message' => 'Perusahaan updated successfully'
                ]);

        $this->assertDatabaseHas('perusahaan', [
            'id' => $perusahaan->id,
            'nama' => 'Updated Company Name',
            'alamat' => 'Updated Address',
            'telepon' => '021-7654321'
        ]);
    }

    /** @test */
    public function authenticated_user_can_delete_perusahaan()
    {
        $perusahaan = perusahaanModel::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->deleteJson('/api/perusahaan/' . $perusahaan->id);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'message' => 'Perusahaan deleted successfully'
                ]);

        $this->assertDatabaseMissing('perusahaan', ['id' => $perusahaan->id]);
    }

    /** @test */
    public function unauthenticated_user_cannot_access_perusahaan_endpoints()
    {
        $response = $this->getJson('/api/perusahaan');
        $response->assertStatus(401);

        $response = $this->postJson('/api/perusahaan', []);
        $response->assertStatus(401);

        $response = $this->getJson('/api/perusahaan/1');
        $response->assertStatus(401);

        $response = $this->putJson('/api/perusahaan/1', []);
        $response->assertStatus(401);

        $response = $this->deleteJson('/api/perusahaan/1');
        $response->assertStatus(401);
    }
}
