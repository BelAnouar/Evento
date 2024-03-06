<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
