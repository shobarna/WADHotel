<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('firstname', 'like', $term)
                ->orWhere('lastname', 'like', $term)
                ->orWhere('phone', 'like', $term)
                ->orWhere('email', 'like', $term)
                ->orWhere('address', 'like', $term);
        });
    }
}
