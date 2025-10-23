<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tymon\JWTAuth\Facades\JWTAuth;

class JabatanApiTest extends TestCase
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
    public function authenticated_user_can_get_jabatan_list()
    {
        Jabatan::factory()->count(3)->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->getJson('/api/jabatan');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'success',
                    'data' => [
                        '*' => [
                            'id',
                            'nama_jabatan',
                            'deskripsi',
                            'gaji_pokok',
                            'level_jabatan',
                            'is_active',
                            'created_at',
                            'updated_at'
                        ]
                    ]
                ]);
    }

    /** @test */
    public function authenticated_user_can_create_jabatan()
    {
        $jabatanData = [
            'nama_jabatan' => 'Software Developer',
            'deskripsi' => 'Mengembangkan aplikasi software',
            'gaji_pokok' => 8000000,
            'level_jabatan' => 'Senior',
            'is_active' => true
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->postJson('/api/jabatan', $jabatanData);

        $response->assertStatus(201)
                ->assertJson([
                    'success' => true,
                    'message' => 'Jabatan created successfully'
                ])
                ->assertJsonStructure([
                    'success',
                    'message',
                    'data' => [
                        'id',
                        'nama_jabatan',
                        'deskripsi',
                        'gaji_pokok',
                        'level_jabatan',
                        'is_active'
                    ]
                ]);

        $this->assertDatabaseHas('jabatan', [
            'nama_jabatan' => 'Software Developer',
            'gaji_pokok' => 8000000
        ]);
    }

    /** @test */
    public function jabatan_creation_fails_with_invalid_data()
    {
        $jabatanData = [
            'nama_jabatan' => '', // Required field empty
            'gaji_pokok' => -1000, // Negative salary
            'is_active' => 'invalid_boolean' // Invalid boolean
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->postJson('/api/jabatan', $jabatanData);

        $response->assertStatus(422)
                ->assertJsonStructure([
                    'success',
                    'message',
                    'errors' => [
                        'nama_jabatan',
                        'gaji_pokok',
                        'is_active'
                    ]
                ]);
    }

    /** @test */
    public function authenticated_user_can_get_specific_jabatan()
    {
        $jabatan = Jabatan::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->getJson('/api/jabatan/' . $jabatan->id);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'data' => [
                        'id' => $jabatan->id,
                        'nama_jabatan' => $jabatan->nama_jabatan
                    ]
                ]);
    }

    /** @test */
    public function get_jabatan_returns_404_for_nonexistent_id()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->getJson('/api/jabatan/999');

        $response->assertStatus(404)
                ->assertJson([
                    'success' => false,
                    'message' => 'Jabatan not found'
                ]);
    }

    /** @test */
    public function authenticated_user_can_update_jabatan()
    {
        $jabatan = Jabatan::factory()->create();

        $updateData = [
            'nama_jabatan' => 'Senior Software Developer',
            'gaji_pokok' => 12000000,
            'level_jabatan' => 'Lead'
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->putJson('/api/jabatan/' . $jabatan->id, $updateData);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'message' => 'Jabatan updated successfully'
                ]);

        $this->assertDatabaseHas('jabatan', [
            'id' => $jabatan->id,
            'nama_jabatan' => 'Senior Software Developer',
            'gaji_pokok' => 12000000,
            'level_jabatan' => 'Lead'
        ]);
    }

    /** @test */
    public function authenticated_user_can_delete_jabatan()
    {
        $jabatan = Jabatan::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->deleteJson('/api/jabatan/' . $jabatan->id);

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'message' => 'Jabatan deleted successfully'
                ]);

        $this->assertDatabaseMissing('jabatan', ['id' => $jabatan->id]);
    }

    /** @test */
    public function unauthenticated_user_cannot_access_jabatan_endpoints()
    {
        $response = $this->getJson('/api/jabatan');
        $response->assertStatus(401);

        $response = $this->postJson('/api/jabatan', []);
        $response->assertStatus(401);

        $response = $this->getJson('/api/jabatan/1');
        $response->assertStatus(401);

        $response = $this->putJson('/api/jabatan/1', []);
        $response->assertStatus(401);

        $response = $this->deleteJson('/api/jabatan/1');
        $response->assertStatus(401);
    }
}
