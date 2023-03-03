<?php

namespace App\Models;
//generated with command $php artisan make:model Listing

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%'); //and this line will help on filtering based on the requested tag
        }
    } // on the listing model, you will be able to filter model and the data
}
