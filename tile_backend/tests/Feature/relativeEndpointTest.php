<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class relativeEndpointTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testRelativeEndpoint(): void
    {
        $user = User::factory()->make();        
        $this->actingAs($user);

        $response = $this->get('/api/relative/50/50/5');

        $response->assertStatus(200);
        $response->assertJson([
            "message"=>"Tile at 50, 50, 5"
        ]);
    }
}
