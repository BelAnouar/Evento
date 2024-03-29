<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Organizer extends User
{
    use HasFactory, HasRoles;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($organizer) {
            $organizer->forceFill(['type' => self::class]);
        });
    }
    public static function  booted()
    {
        static::addGlobalScope('Organizer', function ($builder) {
            $builder->where('type', self::class);
        });
    }
}
