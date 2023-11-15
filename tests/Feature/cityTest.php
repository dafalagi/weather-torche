<?php

namespace Tests\Feature;

use App\Models\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class cityTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testNameSearch(): void
    {
        $responseTrue = $this->get('/api/cities?search=Malang');
        $responseFalse = $this->get('/api/cities?search=Swiss');

        $responseTrue->assertStatus(200);
        $responseFalse->assertStatus(404);

    }

    public function testAddCity(): void
    {
        $responseTrue = $this->post('/api/cities', [
            'name' => 'Birmingham',
        ]);
        $responseFalse = $this->post('/api/cities', [
            'name' => 'Malang',
        ]);

        $responseTrue->assertStatus(200);
        $responseFalse->assertStatus(302);
    }

    public function testUpdateCity(): void
    {
        $responseTrue = $this->put('/api/cities/1', [
            'name' => 'London',
        ]);
        $responseFalse = $this->put('/api/cities/1', [
            'name' => 'Malang',
        ]);
        $responseNotFound = $this->put('/api/cities/50', [
            'name' => 'London',
        ]);

        $responseTrue->assertStatus(200);
        $responseFalse->assertStatus(302);
        $responseNotFound->assertStatus(404);
    }

    public function testDeleteCity(): void
    {
        $lastRecord = City::latest()->first();
        $responseTrue = $this->delete('/api/cities/'.$lastRecord->id);
        $responseNotFound = $this->delete('/api/cities/50');

        $responseTrue->assertStatus(200);
        $responseNotFound->assertStatus(404);
    }
}
