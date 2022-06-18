<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SalesRouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_sales_index_route()
    {
        $response = $this->get('/sales');

        $response->assertStatus(200);
    }
}
