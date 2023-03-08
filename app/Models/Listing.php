<?php

namespace App\Models;
//generated with command $php artisan make:model Listing

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{

    use HasFactory;

    protected $fillable = ['title','company','location','website','email','description','tags','logo'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%'); //and this line will help on filtering based on the requested tag
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%')
                ->orWhere('company', 'like', '%' . request('search') . '%');
                //if the submit button on form search (on _search.blade), 
        }
    } // on the listing model, you will be able to filter model and the data

    // Relationship to User
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
