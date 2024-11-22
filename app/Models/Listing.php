<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $guarded = [];

    //scope filtering ,this function allowed us to filter by clicking on the tag 
    //from our web page 
    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags','like','%'.request('tag'). '%');
        }

        if($filters['search'] ?? false){
            $query->where('title','like','%'.request('search'). '%')
            ->orWhere('description','like','%'.request('search'). '%')
            ->orWhere('tags','like','%'.request('search'). '%')
            ->orWhere('company','like','%'.request('search'). '%')
            ->orWhere('location','like','%'.request('search'). '%');
        }
    }
    

    //relationship to User
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
