<?php

namespace App\Http\Resources;

use App\Enums\CategoryEnum;
use App\Models\Country;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\City;
use App\Models\State;
use App\Enums\ReputationBadgeEnum;

class HotelResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     * @throws \ReflectionException
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'rating' => $this->rating,
            'image' => url($this->image),
            'reputation' => ReputationBadgeEnum::$reputation_badges[$this->reputation],
            'category' => CategoryEnum::$categories[$this->category],
            'price' => $this->price,
            'availability' => $this->availability,
            'country' => Country::where('id', $this->country_id)->first()->name,
            'city' => City::where('id', $this->city_id)->first()->name,
            'state' => State::where('id', $this->state_id)->first()->name,
            'zip_code' => $this->zip_code,
            'address' => $this->address,





        ];
    }
}
