<?php

namespace Tests\Feature;

use App\Models\Hotel;
use App\Models\State;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use App\Models\Country;
use App\Models\City;

class UpdateHotelApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        factory(Hotel::class)->create(['name' => 'hotel test one']);
        $this->country = factory(Country::class)->create(['name' => "egypt"]);
        $this->city = factory(City::class)->create(['name' => 'cairo']);
        $this->state = factory(State::class)->create(['name' => 'nasr city']);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpdateHotel()
    {
        $response = $this->put('/api/v1/hotels/1', [
            'name' => 'updated name example',
            'rating' => '5',
            'category' => 1,
            'zip_code' => 12345,
            'address' => 'Boulevard Díaz Ordaz No. 9 Cantarranas',
            'image' => UploadedFile::fake()->image('avatar.jpg'),
            'reputation' => 1,
            'price' => 10,
            'availability' => 1,
            'country_id' => $this->country->id,
            'city_id' => $this->city->id,
            'state_id' => $this->state->id,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('hotels', [
            'name' => 'updated name example',
            'rating' => '5',
            'category' => 1,
            'zip_code' => 12345,
            'address' => 'Boulevard Díaz Ordaz No. 9 Cantarranas',
            'reputation' => 1,
            'price' => 10,
            'availability' => 1,
            'country_id' => $this->country->id,
            'city_id' => $this->city->id,
            'state_id' => $this->state->id
        ]);
    }
}
