<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, $filter)
    {
        $query->when(
            $filter ?? false, fn ($query, $search) 
            => $query->where('name', 'like', '%' . $search . '%')
        );
    }

    public function weathers()
    {
        return $this->hasMany(Weather::class);
    }
}
