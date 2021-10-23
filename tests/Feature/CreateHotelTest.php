<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\City;
use App\Models\State;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

class CreateHotelTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->country = factory(Country::class)->create(['name' => "egypt"]);
        $this->city = factory(City::class)->create(['name' => 'cairo']);
        $this->state = factory(State::class)->create(['name' => 'nasr city']);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNameShouldBeLongerThan10()
    {
        $response = $this->post('api/v1/hotels', [
            'name' => 'test',
        ]);
        $response->assertStatus(422);
    }

    /**
     * The rating MUST accept only integers, where rating is >= 0 and <= 5
     */
    public function testCategoryField()
    {
        $response = $this->post('api/v1/hotels', [
            'rating' => '9',
        ]);
        $response->assertStatus(422);

//        $validResponse = $this->post('api/v1/hotels',[
//            'rating' =>'5',
//        ]);
//        dd($validResponse);
//        $response->assertStatus(200);
    }

    public function testHotelCreated()
    {
        $response = $this->post('api/v1/hotels', [
            'name' => 'test name example',
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

        $response->assertStatus(201)->assertJson([
            "status" => "success",
            "message" => "Hotel Created successfully"
        ]);

        /**@todo**/
       // assert DB has Values
    }
}
