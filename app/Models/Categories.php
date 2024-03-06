<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = ["name"];

    public function events()
    {
        return $this->hasMany(Event::class, "category_id");
    }
}
