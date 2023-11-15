<?php

namespace App\Models;

use App\Enums\Condition;
use App\Enums\Month;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'month' => Month::class,
        'condition' => Condition::class,
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
                $filters['month'] ?? false, fn ($query, $month) 
                => $query->where('month', $month)
            )->when(
                $filters['condition'] ?? false, fn ($query, $condition) 
                => $query->where('condition', $condition)
            )->when(
                $filters['city'] ?? false, fn ($query, $city)
                => $query->whereHas('city', function ($query) use ($city) {
                    $query->where('name', $city);
                })
            );
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
