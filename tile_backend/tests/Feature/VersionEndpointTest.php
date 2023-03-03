<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VersionEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testVersionEndpoint(): void
    {
        $user = User::factory()->make();        
        $this->actingAs($user);

        $response = $this->getJson('/api/version');
        $response->assertStatus(200);
        $response->assertJson([
            "version"=>"1.0"
        ]);

    }
}
