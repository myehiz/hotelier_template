<?php

namespace Tests\Feature;

use App\Models\Hotel;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class DeleteHotelApiTest
 * @package Tests\Feature
 */
class DeleteHotelApiTest extends TestCase
{
    use RefreshDatabase;


    public function setUp(): void
    {
        parent::setUp();
        factory(Hotel::class)->create(['name' => 'hotel test one']);
    }

    /**
     * test delete Api
     *
     * @return void
     */
    public function testDeleteHotel()
    {
        $response = $this->delete('/api/v1/hotels/1');
        $response->assertStatus(204);
    }
}
