<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Client extends User
{
    use HasFactory, HasRoles;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($client) {
            $client->forceFill(['type' => self::class]);
        });
    }
    public static function  booted()
    {
        static::addGlobalScope('Client', function ($builder) {
            $builder->where('type', self::class);
        });
    }
}
