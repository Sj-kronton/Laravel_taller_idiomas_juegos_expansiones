<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_idioma_index_route_returns_the_expected_view(): void
    {
        $response = $this->get('/idiomas');

        $response->assertStatus(200);
        $response->assertViewIs('idiomas.index');
    }
}
