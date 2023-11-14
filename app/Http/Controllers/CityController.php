<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;

class CityController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index = City::filter(request('search'))->get();

        if ($index->isEmpty()) {
            return $this->sendError('Cities not found.', 404);
        }

        return $this->sendResponse($index, 'Cities retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        $validated = $request->validated();

        $store = City::create($validated);

        return $this->sendResponse($store, 'City created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        return $this->sendResponse($city, 'City retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        $validated = $request->validated();

        $city->update($validated);

        return $this->sendResponse($city, 'City updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();

        return $this->sendResponse($city, 'City deleted successfully.');
    }
}
