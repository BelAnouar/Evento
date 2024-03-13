<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Admin extends User
{
    use HasRoles;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($admin) {
            $admin->forceFill(['type' => self::class]);
        });
    }
    public static function  booted()
    {
        static::addGlobalScope('Admin', function ($builder) {
            $builder->where('type', self::class);
        });
    }
}
