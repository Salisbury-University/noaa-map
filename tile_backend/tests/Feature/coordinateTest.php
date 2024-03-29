<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class coordinateTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCoordinateEndpoint(): void
    {
        $user = User::factory()->make();
        $this->actingAs($user);

        $response = $this->get('/api/coordinate/50/50/5');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Tile at 50, 50 with a width of 5',
        ]);

    }
}
