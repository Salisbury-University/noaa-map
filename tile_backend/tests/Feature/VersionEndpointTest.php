<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

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
            'version' => '1.0',
        ]);

    }
}
