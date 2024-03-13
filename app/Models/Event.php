<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'category_id',
        'available_seats',
        'is_approved',
        'start_time', 'end_time',
        'reservationApproval', 'user_id'
    ];
    use HasFactory;

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }


    public function category()
    {
        return $this->belongsTo(Categories::class, "category_id");
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class, "event_id");
    }



    public function scopeTitle(Builder $query, string $title): Builder
    {
        return $query->where('title', 'LIKE', '%' . $title . '%');
    }


    public function Organizer()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
