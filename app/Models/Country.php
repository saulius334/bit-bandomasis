<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'season'];

    public function getHotels() {
        return $this->hasMany(Hotel::class, 'country_id', 'id');
    }
}
