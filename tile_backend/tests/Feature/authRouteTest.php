<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class authRouteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testAuthRoutesRequireToken(): void
    {
        $response = $this->get('/api/version',['Accept'=>'application/json']);
        $response->assertStatus(401);

        $response = $this->get('/api/welcome',['Accept'=>'application/json']);
        $response->assertStatus(401);

        $response = $this->get('/api/relative/1/2/3',['Accept'=>'application/json']);
        $response->assertStatus(401);

        $response = $this->get('/api/coordinate/1/2/3',['Accept'=>'application/json']);
        $response->assertStatus(401);
    }

    public function testAuthLoginRedirect(): void
    {
        $response = $this->get('/api/version');
        $response->assertStatus(302);

        $response = $this->get('/api/welcome');
        $response->assertStatus(302);

        $response = $this->get('/api/relative/1/2/3');
        $response->assertStatus(302);

        $response = $this->get('/api/coordinate/1/2/3');
        $response->assertStatus(302);
    }
}
