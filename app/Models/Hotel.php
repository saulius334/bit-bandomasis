<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['country_id', 'hotelName',  'price', 'durationStart', 'durationEnd', 'photo'];


    public function getCountry() {
        // dd($this->belongsTo(Country::class, 'country_id', 'id'));
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
