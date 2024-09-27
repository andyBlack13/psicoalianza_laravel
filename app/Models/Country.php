<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'short_description',
        'long_description'
    ];

    public function cities()
    {
        return $this->belongsToMany(City::class, 'country_id');
    }
}
