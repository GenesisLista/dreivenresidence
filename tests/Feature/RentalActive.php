<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RentalActive extends TestCase
{
    /**
     * Test Active Rental.
     *
     * @return void
     */
    public function test_active_rental_response()
    {
        $response = $this->get('/rental/active-rental');

        $response->assertStatus(302);
    }
}
