<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetDistrictsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_success()
    {
        $response = $this->get('/api/districts');

        $response->assertStatus(200);
    }

    public function test_array_response()
    {
        $response = $this->get('/api/districts');

        $response->assertJson([]);
    }

    public function test_filter_surabaya()
    {
        $response = $this->get('/api/districts?name=surabaya');

        $response->assertJson([
            [
                'name' => 'Surabaya'
            ]
        ]);
    }
}
