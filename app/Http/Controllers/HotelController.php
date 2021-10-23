<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Http\Resources\HotelResource;
use App\Repositories\HotelRepository;

/**
 * Class HotelController
 * @package App\Http\Controllers
 */
class HotelController extends Controller
{
    private $hotelRepository;

    public function __construct(HotelRepository $hotelRepository)
    {
        $this->hotelRepository = $hotelRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $hotels = $this->hotelRepository->getAllHotels();

        return successWithResponse($hotels);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelRequest $request)
    {
        $saved = $this->hotelRepository->saveHotel($request->all());
        if ($saved) {
            return success("Hotel Created successfully", 201);
        }
        return fail('Something went wrong', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $hotel = $this->hotelRepository->getHotelById($id);
        if ($hotel) {
            return success($hotel, 200);
        }
        return fail('Hotel Does not  exists', 404);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HotelRequest $request,int  $id)
    {
        $hotel = $this->hotelRepository->updateHotel($id, $request->all());
        if ($hotel) {
            return success(new HotelResource($hotel));
        }
        return fail('Something went wrong', 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $deleted = $this->hotelRepository->deleteHotel($id);
        if ($deleted) {
            return success("Hotel deleted successfully", 204);
        }

        return fail("something went wrong", 500);
    }

    /**
     * @param $hotel_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function book(int $hotel_id)
    {
        $booked = $this->hotelRepository->book($hotel_id);
        if ($booked) {
            return success('Hotel booked successfully');
        }
        return fail("Hotel fully booked", 422);
    }
}
