<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class frontendPageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testFrontPage(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testTutorialPage(): void
    {
        $response=$this->get('/tutorial');
        $response->assertStatus(200);
    }
    public function testDocumentationPage(): void
    {
        $response=$this->get('/documentation');
        $response->assertStatus(200);
    }
    public function testTokensPage(): void
    {
        $response=$this->get('/tokens');
        $response->assertStatus(302);
    }
    public function testAboutPage(): void
    {
        $response=$this->get('/about');
        $response->assertStatus(200);
    }
}
