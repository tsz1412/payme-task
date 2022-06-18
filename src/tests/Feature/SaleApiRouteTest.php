<?php

namespace Tests\Feature;

use App\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SaleApiRouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_sales_index_route()
    {
        $sale = Sale::factory()->create();

        $response = $this->get('/api/sales/'.Sale::first()->id);

        $response->assertStatus(200);
    }
}
