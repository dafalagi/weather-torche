<?php

namespace Tests\Feature;

use App\Models\Weather;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class weatherTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCitySearch(): void
    {
        $responseTrue = $this->get('/api/weathers?city=Malang');
        $responseFalse = $this->get('/api/weathers?city=Swiss');

        $responseTrue->assertStatus(200);
        $responseFalse->assertStatus(404);
    }

    public function testMonthSearch(): void
    {
        $responseTrue = $this->get('/api/weathers?month=January');
        $responseFalse = $this->get('/api/weathers?month=Maret');

        $responseTrue->assertStatus(200);
        $responseFalse->assertStatus(404);
    }

    public function testConditionSearch(): void
    {
        $responseTrue = $this->get('/api/weathers?condition=Rainy');
        $responseFalse = $this->get('/api/weathers?condition=Snowy');

        $responseTrue->assertStatus(200);
        $responseFalse->assertStatus(404);
    }

    public function testAddWeather(): void
    {
        $responseTrue = $this->post('/api/weathers', [
            'city_id' => 1,
            'month' => 'January',
            'day' => 31,
            'condition' => 'Rainy',
        ]);
        $responseFalse = $this->post('/api/weathers', [
            'city_id' => 1,
            'month' => 'January',
            'day' => 1,
            'condition' => 'Windy',
        ]);

        $responseTrue->assertStatus(200);
        $responseFalse->assertStatus(500);
    }

    public function testUpdateWeather(): void
    {
        $responseTrue = $this->put('/api/weathers/2', [
            'city_id' => 1,
            'month' => 'January',
            'day' => 2,
            'condition' => 'Windy',
        ]);
        $responseFalse = $this->put('/api/weathers/1', [
            'city_id' => 1,
            'month' => 'January',
            'day' => 1,
            'condition' => 'Windy',
        ]);
        $responseNotFound = $this->put('/api/weathers/0', [
            'city_id' => 1,
            'month' => 'January',
            'day' => 1,
            'condition' => 'Windy',
        ]);

        $responseTrue->assertStatus(200);
        $responseFalse->assertStatus(500);
        $responseNotFound->assertStatus(404);
    }

    public function testDeleteWeather(): void
    {
        $lastRecord = Weather::latest()->first();

        $responseTrue = $this->delete('/api/weathers/'.$lastRecord->id);
        $responseNotFound = $this->delete('/api/weathers/0');

        $responseTrue->assertStatus(200);
        $responseNotFound->assertStatus(404);
    }
}
