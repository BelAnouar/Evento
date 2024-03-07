<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'event_id', "status"

    ];
    use HasFactory;

    public function event()
    {
        return $this->belongsTo(Event::class, "event_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
