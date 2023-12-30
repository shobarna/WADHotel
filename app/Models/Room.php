<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function bookings()
    {
        return $this->hasMany(BookingRoom::class);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('number', 'like', $term)
                ->orWhere('status', 'like', $term);
        });
    }
}
