<?php

namespace Database\Seeders;

use App\Models\Weather;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];

        for ($i = 1; $i <= 10; $i++) {
            foreach ($months as $month){
                for ($k = 1; $k <= 30; $k++) {
                    Weather::create([
                        'city_id' => $i,
                        'month' => $month,
                        'day' => $k,
                        'condition' => collect(['sunny', 'cloudy', 'rainy', 'windy'])->random(),
                    ]);
                }
            }
        }
    }
}
