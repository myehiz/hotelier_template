<?php

namespace App\Repositories;

use App\Http\Resources\HotelResource;
use App\Models\Hotel;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class HotelRepository
{
    /**
     * @param array $data
     * @return mixed
     */
    public function saveHotel(array $data)
    {
        if (isset($data['image']) && $data['image'] instanceof  UploadedFile) {
            $data['image'] = $this->uploadImage($data['image']);
        }
        return Hotel::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function updateHotel(int $id, array $data)
    {
        $hotel = Hotel::findOrfail($id);

        if (isset($data['image']) && $data['image'] instanceof  UploadedFile) {
            $data['image'] = $this->uploadImage($data['image']);
        }
        $updated = $hotel->update($data);
        if ($updated) {
            return $hotel;
        }
        return false;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getHotelById(int $id)
    {
        $hotel = Hotel::findOrFail($id);
        return new HotelResource($hotel);
    }

    /**
     * @return mixed
     */
    public function getAllHotels()
    {
        $hotels = Hotel::paginate(20);

        // $hotelResource = new HotelResource($hotels);
        return $hotels;
    }

    /**
     * @param $hotel_id
     * @return bool
     */
    public function book(int $hotel_id)
    {
        $hotel = Hotel::find($hotel_id);
        if ($hotel->availability) {
            return Hotel::find($hotel_id)->decrement('availability', 1);
        }
        return false;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteHotel(int $id)
    {
        return  Hotel::findOrfail($id)->delete();
    }

    /**
     * @param UploadedFile $image
     * @return string
     */
    public function uploadImage(UploadedFile $image)
    {
        $ext = $image->getClientOriginalExtension();
        $fileName = time() . '.' . $ext;
        $dist = 'uploads/hotels/images';
        $image->move($dist, $fileName);
        return $dist . '/' . $fileName;
    }
}
