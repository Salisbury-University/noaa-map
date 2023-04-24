<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testWelcomeEndpoint(): void
    {
        $user = User::factory()->make();        
        $this->actingAs($user);

        $response = $this->getJson('/api/welcome');
        $response->assertStatus(200);
        $response->assertJson([
            "message"=>"Hello BathMap User!"
        ]);
    }
}
