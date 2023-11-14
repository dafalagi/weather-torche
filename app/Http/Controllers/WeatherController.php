<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use App\Http\Requests\StoreWeatherRequest;
use App\Http\Requests\UpdateWeatherRequest;

class WeatherController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index = Weather::filter(request(['city', 'month', 'condition']))->get();

        if ($index->isEmpty()) {
            return $this->sendError('Weather not found.', 404);
        }

        return $this->sendResponse($index, 'Weather retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWeatherRequest $request)
    {
        $validated = $request->validated();

        $weather = Weather::create($validated);

        return $this->sendResponse($weather, 'Weather created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Weather $weather)
    {
        return $this->sendResponse($weather, 'Weather retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWeatherRequest $request, Weather $weather)
    {
        $validated = $request->validated();

        $weather->update($validated);

        return $this->sendResponse($weather, 'Weather updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Weather $weather)
    {
        $weather->delete();

        return $this->sendResponse($weather, 'Weather deleted successfully.');
    }
}
