<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\State;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListHotelApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        factory(Hotel::class)->create();
    }

    public function testList()
    {
        $response = $this->get('api/v1/hotels');


        $response->assertStatus(200);
        $this->assertCount(1, $response->json()['data']['data']);
    }
}
