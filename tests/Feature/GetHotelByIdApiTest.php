<?php

namespace Tests\Feature;

use App\Models\Hotel;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetHotelByIdApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        factory(Hotel::class)->create(['name'=>'hotel test one']);

    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetByIdApi()
    {
        $response = $this->get('/api/v1/hotels/1');

        $response->assertStatus(200);
    }
}
